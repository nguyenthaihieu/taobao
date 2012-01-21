/*
Autor: Alexander Danilenko
Site Autor: http://vkontakte.ru/xlazerx
*/

function validateEmail(email){
    var splitted = email.match("^(.+)@(.+)$");
    if(splitted == null) return false;
    if(splitted[1] != null )
    {
      var regexp_user=/^\"?[\w-_\.]*\"?$/;
      if(splitted[1].match(regexp_user) == null) return false;
    }
    if(splitted[2] != null)
    {
      var regexp_domain=/^[\w-\.]*\.[A-Za-z]{2,4}$/;
      if(splitted[2].match(regexp_domain) == null) 
      {
	    var regexp_ip =/^\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\]$/;
	    if(splitted[2].match(regexp_ip) == null) return false;
      }
      return true;
    }
return false;
}

(function($){
	$.fn.validate = function(o){
		var o = $.extend({
			requre:'requre', // класс по которому проверяется обязательность
			position: 'after', // позиция вывода ошибки
			mail:false, // имя инпута в которое вводится E-mail
			mess_error:'Заполните это поле', // Текст ошибки
			mess_mail:'Введите правильный E-mail', // Текст ошибки для не правильного E-mail
			mess_check:'Согласитесь с условием', // Текст ошибки для чекбокса
			check_position:'after', // Позиция вывода ошибки для чекбокса
			pass1:false, // класс инпута пароля, классы паролей должны быть разными
			pass2:false,  // класс инпута пароля
			pass_min:0, // минимальное кол. символов пароля
			mess_pass:'Пароли не совпадают', // сообщение ошибки пароля
			mess_min:'Минимальная длина пароля'
		},o || {});
		return this.each(function(){
			var this_item = $(this);
			var requre_item = $('input,textarea,select',this_item);
			var submit = $('input[type=submit]',this_item);
			if(o.mail){
				var mail = $('input[name='+o.mail+']',this_item);
			}
				
			$(submit).after('<input type="hidden" id="valid_hidden" />');
			
			if(o.position=='before'){ 
				var count_q = 0;
				$(requre_item).each(function(){
					var each_item = $(this);
					if($(each_item).hasClass(o.requre) && $(each_item).attr("type")=='checkbox'){
						count_q++;
						if(o.check_position=='after'){
							$(each_item).after('<div id="validate_item'+count_q+'" class="validate_mess" style="display:none;">'+o.mess_check+'</div>');
						}else{
							$(each_item).before('<div id="validate_item'+count_q+'" class="validate_mess" style="display:none;">'+o.mess_check+'</div>');		
						}
					}else if($(each_item).hasClass(o.requre)){ 
						count_q++;
						$(each_item).before('<div id="validate_item'+count_q+'" class="validate_mess" style="display:none;">'+o.mess_error+'</div>');
					}
				});
				if(o.mail){
					$(mail).before('<div id="validate_mail" class="validate_mess" style="display:none;">'+o.mess_mail+'</div>');
				}
				if(o.pass1){
					$('input.'+o.pass2).before('<div id="validate_pass" class="validate_mess" style="display:none;">'+o.mess_pass+'</div>');
				}
				if(o.pass_min>0){
					$('input.'+o.pass1).before('<div id="validate_pass_min1" class="validate_mess" style="display:none;">'+o.mess_min+'</div>');
					$('input.'+o.pass2).before('<div id="validate_pass_min2" class="validate_mess" style="display:none;">'+o.mess_min+'</div>');
				}
			}else{
				var count_q = 0;
				$(requre_item).each(function(){
					var each_item = $(this);
					if($(each_item).hasClass(o.requre) && $(each_item).attr("type")=='checkbox'){
						count_q++;
						if(o.check_position=='before'){
							$(each_item).before('<div id="validate_item'+count_q+'" class="validate_mess" style="display:none;">'+o.mess_check+'</div>');
						}else{
							$(each_item).after('<div id="validate_item'+count_q+'" class="validate_mess" style="display:none;">'+o.mess_check+'</div>');		
						}
					}else if($(each_item).hasClass(o.requre)){ 
						count_q++;
						$(each_item).after('<div id="validate_item'+count_q+'" class="validate_mess" style="display:none;">'+o.mess_error+'</div>');
					}
				});
				if(o.mail){
					$(mail).after('<div id="validate_mail" class="validate_mess" style="display:none;">'+o.mess_mail+'</div>');
				}
				if(o.pass1){
					$('input.'+o.pass2).after('<div id="validate_pass" class="validate_mess" style="display:none;">'+o.mess_pass+'</div>');
				}
				if(o.pass_min>0){
					$('input.'+o.pass1).after('<div id="validate_pass_min1" class="validate_mess" style="display:none;">'+o.mess_min+'</div>');
					$('input.'+o.pass2).after('<div id="validate_pass_min2" class="validate_mess" style="display:none;">'+o.mess_min+'</div>');
				}
			}
						
				this_item.submit(function(){
					var count_sub = 0;
					var valid = 0;
					$(requre_item).each(function(){
						if($(this).hasClass(o.requre) && $(this).attr("type")=='checkbox'){
							count_sub++;
							if($(this).is(':checked')){
								$('#validate_item'+count_sub).slideUp(500);
							}else{
								valid++;
								$('#validate_item'+count_sub).slideDown(500);
							}
						}else if($(this).hasClass(o.requre)){
							count_sub++;
							if($(this).val()==''){
								valid++;
								$('#validate_item'+count_sub).slideDown(500);
							}else{
								$('#validate_item'+count_sub).slideUp(500);
							}
						}
						$('#valid_hidden').val(valid);
					});
					
					var flag = $('#valid_hidden').val();
					if(o.mail && o.pass1==false && o.pass_min==0){
						var mail_value = $(mail).val();
						var mail_valid = validateEmail(mail_value);					
										
						if(mail_valid==false && mail_value!=''){
							$('#validate_mail').slideDown(500);
						}else{
							$('#validate_mail').slideUp(500);
						}
						if(flag!=0 || mail_valid==false){
							return false;
						}
					}else if(o.mail && o.pass1 && o.pass_min==0){
						var mail_value = $(mail).val();
						var mail_valid = validateEmail(mail_value);					
						var pass1 = $('input.'+o.pass1).val();
						var pass2 = $('input.'+o.pass2).val();
															
						if(mail_valid==false && mail_value!=''){
							$('#validate_mail').slideDown(500);
						}else{
							$('#validate_mail').slideUp(500);
						}
						
											
						if(flag!=0 || mail_valid==false || (pass1!=pass2 && pass1!='' && pass2!='')){
							return false;
						}
					}else if(o.mail==false && o.pass1 && o.pass_min==0){
						var pass1 = $('input.'+o.pass1).val();
						var pass2 = $('input.'+o.pass2).val();
											
						if(pass1!=pass2 && pass1!='' && pass2!=''){
							$('#validate_pass').slideDown(500);
						}else{
							$('#validate_pass').slideUp(500);
						}
						
						if(flag!=0 || (pass1!=pass2 && pass1!='' && pass2!='')){
							return false;
						}
						
					}else if(o.mail && o.pass1 && o.pass_min>0){
						var mail_value = $(mail).val();
						var mail_valid = validateEmail(mail_value);					
						var pass1 = $('input.'+o.pass1).val();
						var pass2 = $('input.'+o.pass2).val();
						var pass1_leng = pass1.length;	
						var pass2_leng = pass2.length;	
									
						if(mail_valid==false && mail_value!=''){
							$('#validate_mail').slideDown(500);
						}else{
							$('#validate_mail').slideUp(500);
						}
						
						if(pass1_leng<o.pass_min && pass1!='' && pass2!=''){
							$('#validate_pass_min1').slideDown(500);
						}else{
							$('#validate_pass_min1').slideUp(500);
							if(pass1!=pass2 && pass1!='' && pass2!='' && pass1_leng>=o.pass_min){
								$('#validate_pass').slideDown(500);
							}else{
								$('#validate_pass').slideUp(500);
							}
						}
						
						if(pass2_leng<o.pass_min && pass1!='' && pass2!=''){
							$('#validate_pass_min2').slideDown(500);
						}else{
							$('#validate_pass_min2').slideUp(500);
							if(pass1!=pass2 && pass1!='' && pass2!='' && pass2_leng>=o.pass_min){
								$('#validate_pass').slideDown(500);
							}else{
								$('#validate_pass').slideUp(500);
							}
						}
						
						if(flag!=0 || mail_valid==false || (pass1!=pass2 && pass1!='' && pass2!='') || pass1_leng < o.pass_min || pass2_leng < o.pass_min){
							return false;
						}
					}else if(o.mail==false && o.pass1 && o.pass_min>0){
						var pass1 = $('input.'+o.pass1).val();
						var pass2 = $('input.'+o.pass2).val();
						var pass1_leng = pass1.length;	
						var pass2_leng = pass2.length;	
									
						if(pass1_leng<o.pass_min && pass1!='' && pass2!=''){
							$('#validate_pass_min1').slideDown(500);
						}else{
							$('#validate_pass_min1').slideUp(500);
							if(pass1!=pass2 && pass1!='' && pass2!='' && pass1_leng>=o.pass_min){
								$('#validate_pass').slideDown(500);
							}else{
								$('#validate_pass').slideUp(500);
							}
						}
						
						if(pass2_leng<o.pass_min && pass1!='' && pass2!=''){
							$('#validate_pass_min2').slideDown(500);
						}else{
							$('#validate_pass_min2').slideUp(500);
							if(pass1!=pass2 && pass1!='' && pass2!='' && pass2_leng>=o.pass_min){
								$('#validate_pass').slideDown(500);
							}else{
								$('#validate_pass').slideUp(500);
							}
						}
						
						if(flag!=0 || (pass1!=pass2 && pass1!='' && pass2!='') || pass1_leng < o.pass_min || pass2_leng < o.pass_min){
							return false;
						}
					}else{
						if(flag!=0){
							return false;
						}
					}
					
				});
					
				
				
		});
	}
})(jQuery);
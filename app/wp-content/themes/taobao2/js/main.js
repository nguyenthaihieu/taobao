jQuery(function($) {
    initCounter();
    setInterval(initCounter, 1000);
    initCarousel();
    initSlider();
    initSelect();
    initTabs();
    initTabs2();
    $('#do').click(function(){
        translate_bing($('#source').val(), 'ru', 'zh-CN', function(dat){$('#target').val(dat)});
    })

    $('#form_one').submit(function () {
        var returnValue = true;
        if (!$('#author').val()) {
            $('#valida-name').show();
            returnValue = false;
        }

        if (!$('#email').val()) {
            $('#valida-email').text('Пожалуйста, заполните обязательные поля.');
            $('#valida-email').show();
            returnValue = false;
        } else {
            if (!isValidEmailAddress($('#email').val())) {
                $('#valida-email').html('Некорректный e-mail адрес.');
                $('#valida-email').show();
                returnValue = false;
            }
        }



        if (!$('#comment').val()) {
            $('#valida-comment').show();

            returnValue = false;
        }
        if (returnValue == false) {
            return false;
        }
    })
    $('#valida-name , #author').hover(function () {
        $('#valida-name').hide();
    })

    $('#valida-email , #email').hover(function () {
        $('#valida-email').hide();
    })
    $('#valida-comment , #comment').hover(function () {
        $('#valida-comment').hide();
    })
    $('label[for=solo-subscribe-email] , #solo-subscribe-email').hover(function () {
        $('label[for=solo-subscribe-email]').text('E-Mail:').attr('class','');
    })

        $('form > input.cbutton').click(function(){
        if(!$('#solo-subscribe-email').val()) {
            $('label[for=solo-subscribe-email]').text('Пожалуйста, заполните обязательные полe e-mail .').attr('class','red');
//            $('a[title=Каталог]').attr('target','_blank');
//           alert('Введите e-mail!');
            return false;
        }else {
            alert('1');
            if (!isValidEmailAddress($('#solo-subscribe-email').val())) {
                $('label[for=solo-subscribe-email]').html('Некорректный e-mail адрес.').attr('class','red');
                $('label[for=solo-subscribe-email]').show();
                alert('e');
                return false;
            }
        }
    });

    function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
    }

    function initCarousel() {
        $("div.slaider-video").jCarouselLite({
            btnNext: "div.videos span.next",
            btnPrev: "div.videos span.prev",
            speed: 400,
            visible: 3,
            circular: false
        });
		$("#content div.slaider-video").jCarouselLite({
            btnNext: "#content div.videos span.next",
            btnPrev: "#content div.videos span.prev",
            speed: 400,
            visible: 3,
            circular: false
        });

        $("#content div.slaide-page").jCarouselLite({
            btnNext: "div.slaider-box-page span.next",
            btnPrev: "div.slaider-box-page span.prev",
            speed: 400,
            visible: 1,
            circular: false
        });
    }

    function initSlider() {
        $('.slider ul').cycle({
            fx:     'fade',
            timeout: 5000,
            pager:  '.pager'
        });
        $('div.slaide ul').cycle({
            fx:     'fade',
            next: 'div.slaider-box span.next',
            prev: 'div.slaider-box span.prev',
            timeout: 5000,
            pager:  '.pagers'


        });
    }

    function initTabs() {
        jQuery('ul.tabs li').click(function() {
            var thisClass = this.className.slice(0, 2);
            jQuery('div.t1').hide();
            jQuery('div.t2').hide();
            jQuery('div.t3').hide();
            jQuery('div.t4').hide();
            jQuery('div.' + thisClass).show();
            jQuery('ul.tabs li').removeClass('activ');
            jQuery(this).addClass('activ');
            return false;
        });
        jQuery('li.t4').click();

        $('ul.tabs li').click(function() {
            var thisClass = this.className.slice(0, 2);
            $('div.t5').hide();
            $('div.t6').hide();
            $('div.t7').hide();
            $('div.t8').hide();
            $('div.' + thisClass).show();
            $('ul.tabs li').removeClass('tab-current');
            $(this).addClass('tab-current');
            return false;
        });

        $('li.t5').click();

    }


    function initTabs2() {
        jQuery('dl.tabs dt').click(function() {
            var thisClass = this.className.slice(0, 3);
            jQuery('div.ta1').hide();
            jQuery('div.ta2').hide();
            jQuery('div.ta3').hide();
            jQuery('div.ta4').hide();
            jQuery('div.' + thisClass).show();
            jQuery('dl.tabs dt').removeClass('tab-current');
            jQuery(this).addClass('tab-current');
            return false;
        });
        jQuery('dt.ta1').click();
    }

    function initSelect() {
        var currentCountry = $.cookie('country');
        $("#search_country").val(currentCountry);

        $("#search_country").live('change', function(){
            var currentCountry = $(this).val();
            $.cookie('country', currentCountry);
        })

        var params = {
            changedEl: "#search_country",
            visRows: 16,
            scrollArrows: true
        }

        cuSel(params);
    }


    function initCounter() {
        $('#counter').load(blogUrl + '/?timer');
    }

});
$(function(){
    $('a[title=Каталог]').attr('target','_blank');

    $('ul.reviews li').click(function() {
        $(this).css('max-height','none');
    });
});


<script src="js/vendor/modernizr-3.7.1.min.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script>
    // create function check element exists
    $.fn.exists = function(callback) {
        var args = [].slice.call(arguments, 1);

        if (this.length) {
            callback.call(this, args);
        }

        return this;
    };
</script>

<script src="https://www.google.com/recaptcha/api.js?render=<?= $site_key ?>"></script>

<?php foreach ($js_link_array as $item_js) : ?>
    <script src="<?= $item_js ?>"></script>
<?php endforeach; ?>
<!-- grecaptcha init -->
<script>
    grecaptcha.ready(function() {
        $('#recaptchaResponseContact').exists(function() {
            grecaptcha.execute('<?= $site_key ?>', {
                action: 'contact'
            }).then(function(token) {
                $('#recaptchaResponseContact').val(token);
            });
        })
        $('#recaptchaResponseRegister').exists(function() {
            grecaptcha.execute('<?= $site_key ?>', {
                action: 'register'
            }).then(function(token) {
                $('#recaptchaResponseRegister').val(token);
            });
        })
        $('#recapchaPay').exists(function() {
            grecaptcha.execute('<?= $site_key ?>', {
                action: 'pay'
            }).then(function(token) {
                $('#recapchaPay').val(token);
            });
        })
        $('#recaptchaResponseEmail').exists(function() {
            grecaptcha.execute('<?= $site_key ?>', {
                action: 'email'
            }).then(function(token) {
                $('#recaptchaResponseEmail').val(token);
            });
        })

    });
</script>

<!-- menu bar fixed -->
<script>
    $(window).scroll(function(event) {
        if ($(window).scrollTop() > $('#header').height()) {
            $('#menu').addClass('fixed');
        } else {
            $('#menu').removeClass('fixed');
        }
    });
</script>

<!-- lazyload init -->
<script>
    if (typeof LazyLoad != 'undefined') {
        var myLazyLoad = new LazyLoad({
            elements_selector: ".lazy"
        });
    }
</script>

<!-- mmenu init -->
<script>
    if ($.fn.mmenu) {
        $("#menu_bootstrap").mmenu({
            "extensions": [
                "pagedim-black"
            ]
        });
        var api_mmenu = $("#menu_bootstrap").data('mmenu');
        api_mmenu.bind('opened', function() {
            $('#btn_menu_bootstrap').addClass('move_btn_bootstrap');
        });
        api_mmenu.bind('closed', function() {
            $('#btn_menu_bootstrap').removeClass('move_btn_bootstrap');
        });
    }
</script>

<!--  fancybox init -->
<script>
    if ($.fn.fancybox) {
        // popup init
        $('#popup_fancy').exists(function() {
            $.fancybox.open({
                src: '#popup_fancy',
                type: 'inline',

            });
        })

    }
</script>


<!-- simplyscroll init -->
<script>
    $(document).ready(function() {
        if ($.fn.simplyScroll) {
            $(".news-scroll").simplyScroll({
                orientation: 'vertical',
                customClass: 'vert'
            });
            $("#owl_video").simplyScroll({
                orientation: 'vertical',
                customClass: 'vert'
            });
        }
    })
</script>

<!-- form submit -->
<script>
    $(document).ready(function() {
        $('#frmDK').exists(function() {
            $('#frmDK').submit(function(event) {
                $.ajax({
                        url: 'ajax/ykienkhachhang.php',
                        type: 'POST',
                        data: $('#frmDK').serializeArray(),
                    })
                    .done(function(result) {
                        if (result == 1) {
                            alert("Gửi thông tin thành công!");
                            $("#frmDK")[0].reset();
                        } else if (result == 0) {
                            alert("Hệ thống lỗi, thử lại sau!");
                        } else if (result == 2) {
                            alert("Hệ thống cho thấy bạn đang spam dữ liệu");
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    });
                return false;
            });
        })

        $('.dangkymail').exists(function() {
            $('.dangkymail').submit(function(event) {
                var email = $('.dangkymail input').val();
                var formData = (this).serializeArray();
                $.ajax({
                    type: "POST",
                    url: "ajax/dangky_email.php",
                    data: formData,
                    success: function(result) {
                        if (result == 0) {
                            $('.dangkymail')[0].reset();
                            alert('Đăng ký thành công ! ');
                        } else if (result == 1) {
                            $('.dangkymail')[0].reset();
                            alert('Email đã được đăng ký ! ');
                        } else if (result == 2) {
                            alert(' ! Đăng ký không thành công . Vui lòng thử lại ');
                        }
                    }
                });
                return false;
            });
        })

        $('.item_video').click(function(event) {
            var id = $(this).data('id');
            $('#main_video_owl iframe').attr('src', 'https://www.youtube.com/embed/' + id);
        });

        $('#list_video').change(function() {
            var link_video = $(this).val();
            $('#video iframe').attr('src', link_video);
        })

    })
</script>

<!-- slick init -->
<script>
    if ($.fn.slick) {
        $('.product-slick').slick({
            centerMode: true,
            infinite: true,
            centerPadding: '0',
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: false,
            dots: false
        })
    }
</script>

<!-- owlcarousel init -->
<script>
    $(document).ready(function() {
        if ($.fn.owlCarousel) {
            var owl = $("#owl_img_detail");
            owl.owlCarousel({
                rtl: false,
                loop: false,
                margin: 1,
                dots: false,
                nav: false,
                responsive: {
                    0: {
                        items: 4
                    },
                    600: {
                        items: 5
                    },
                    1000: {
                        items: 6
                    }
                }
            });
            $(".next_sub_detail").click(function() {
                owl.trigger('next.owl');
            });
            $(".prev_sub_detail").click(function() {
                owl.trigger('prev.owl');
            });

            $('#slider').owlCarousel({
                rtl: false,
                loop: false,
                margin: 0,
                animateOut: 'fadeOut',
                nav: false,
                rewind: true,
                lazyLoad: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                items: 1
            });

            $('#owl_video').owlCarousel({
                rtl: false,
                loop: false,
                margin: 10,
                nav: false,
                rewind: true,
                lazyLoad: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                items: 3
            });

            $('#news_owl').owlCarousel({
                rtl: false,
                loop: false,
                margin: 45,
                nav: false,
                rewind: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });
            $('#product_owl').owlCarousel({
                rtl: false,
                loop: false,
                margin: 30,
                nav: false,
                rewind: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        margin: 15,
                        items: 2
                    },
                    500: {
                        margin: 20,
                        items: 2
                    },
                    768: {
                        margin: 20,
                        items: 3
                    },
                    1000: {
                        margin: 20,
                        items: 4
                    },
                    1028: {
                        items: 4
                    }
                }
            });
        }
    })
</script>

<?php include_once 'js/temp/js_backto_top.php'; ?>

<?php if ($source == 'product' || $template == 'index' || $com == 'tim-kiem') { ?>
    <script type="text/javascript">
        function flyToElement(flyer, flyingTo) {
            var $func = $(this);
            var flyerClone = $(flyer).clone();
            $(flyerClone).css({
                position: 'absolute',
                top: $(flyer).offset().top + "px",
                left: $(flyer).offset().left + "px",
                opacity: 1,
                'z-index': 1000
            }).appendTo($('body'));
            var gotoX = $(flyingTo).offset().left;
            var gotoY = $(flyingTo).offset().top;
            $(flyerClone).animate({
                    opacity: 0.4,
                    left: gotoX,
                    top: gotoY,
                    width: $(flyingTo).width(),
                    height: $(flyingTo).height()
                }, 700,
                function() {
                    $(flyerClone).remove();
                });
        }

        function addtocart(pid, sl, action) {
            $.ajax({
                    url: 'ajax/add_giohang.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        pid: pid,
                        sl: sl
                    },
                })
                .done(function(result) {
                    if ($.notify) {
                        $.notify({
                            title: 'Add cart notify:',
                            message: 'Add to cart successfully',
                            icon: 'fas fa-check-square',
                            url: 'gio-hang'
                        }, {
                            type: "success"
                        })
                    }
                    if (action == 1) {
                        window.location.href = 'gio-hang';
                    } else {
                        flyToElement(result.img, $('#numcart'));
                        $('#numcart').text(result.sl);
                    }
                })
                .fail(function() {
                    console.log("error");
                    if ($.notify) {
                        $.notify({
                            title: 'Add cart notify',
                            message: 'Add to cart failed',
                            icon: 'fas fa-exclamation-circle',
                        }, {
                            type: "danger"
                        })
                    }
                });
        }
    </script>

<?php } ?>
<!--end-->
<?php if ($template == 'product_detail') { ?>
    <script type="text/javascript">
        $('#minus').click(function(event) {
            var number = $('.amount').val();
            if (number > 1) number = parseInt(number) - 1;
            else number = 1;
            $('.amount').val(number);
            return false;
        });
        $('#plus').click(function(event) {
            var number = $('.amount').val();
            number = parseInt(number) + 1;
            $('.amount').val(number);
            return false;
        });
    </script>
<?php } ?>
<?php if ($com == 'dang-ky' || $com == 'thanh-toan') { ?>
    <script type="text/javascript">
        $('#tinhthanh').change(function(event) {
            $('#quanhuyen').load('ajax/load_quanhuyen.php', {
                id: $(this).val()
            });
        });
    </script>
<?php } ?>

<?php if ($com == 'thanh-toan') { ?>
    <script type="text/javascript">
        var id = $('.radio input[name=httt]:checked').val();
        $('.radio input[name=httt]').click(function() {
            id = $(this).val();
            $('div.content_httt').removeClass('active');
            $('#httt' + id).addClass('active');
        });
    </script>
<?php } ?>


<?php if ($template == 'index') { ?>
    <script>
        var fired = false;
        window.addEventListener("scroll", function() {
            if ((document.documentElement.scrollTop != 0 && fired === false) || (document.body.scrollTop != 0 && fired === false)) {
                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s);
                    js.id = id;
                    js.async = true;
                    js.src = "https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));

                fired = true;
            }
        }, true);
    </script>
<?php } else { ?>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.async = true;
            js.src = "https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
<?php } ?>
<script>
    $(document).ready(function() {
        $('.support-content').hide();
        $('a.btn-support').click(function(e) {
            e.stopPropagation();
            $('.support-content').slideToggle();
        });
        $('.support-content').click(function(e) {
            e.stopPropagation();
        });
        $(document).click(function() {
            $('.support-content').slideUp();
        });
    });
</script>

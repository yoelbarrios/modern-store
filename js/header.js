$(document).ready(main);

        var contador = 1;

        function main() {
            $('.btn').click(function() {
                // $('nav').toggle();

                if (contador == 1) {
                    $('.items').animate({
                        left: '0'
                    });
                    contador = 0;
                } else {
                    contador = 1;
                    $('.items').animate({
                        left: '-100%'
                    });
                }

            });

        };

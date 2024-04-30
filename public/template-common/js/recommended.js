function getRecommendedData(path) {
    var checkout_path = '';
    var path_f = path.split('/onebuy/')[1];
    if (path_f.indexOf('?') != -1) {
        checkout_path = path_f.substring(0, path_f.indexOf('?'));
    } else {
        checkout_path = path_f;
    }
    if (checkout_path) {
        fetch('/onebuy/recommended/query?checkout_path=' + decodeURI(checkout_path) + '', {
            method: 'GET',
            headers: {
                'content-type': 'application/json'
            },
        }).then(function(data) {
            return data.json();
        }).then(function(data) {
            setRecommended(data);
        })
    }
}

function setRecommended(data) {
    console.log(data);
    var all_data = data.data;
    console.log(all_data);
    if (all_data) {
        var products = all_data.recommended_info;
        var recommend_source_page = "from=" + window.location.href;
        var utm = "";
        var recommendedProduct = document.createElement('div');
        recommendedProduct.setAttribute('id', 'recommended');
        var grid = document.querySelector('.large--five-sixths');
        var footer = document.querySelector('.large--five-sixths .main__footer');
        var html = '<div class="content-box"><h2 class="heading-2 os-step__title">' + data.data.recommended_info_title + '</h2>';
        html += '<div id="my-swiper" class="swiper-container">';
        html += '<div class="swiper-wrapper">';
        for (var i = 0; i < products.length; i++) {
            var url = '';
            if (products[i].url.indexOf('?') != -1) {
                if (products[i].url.lastIndexOf('?') == (products[i].url.length - 1)) {
                    url = products[i].url + utm + recommend_source_page;
                } else {
                    url = products[i].url + '&' + utm + recommend_source_page;
                }
            } else {
                url = products[i].url + '?' + utm + recommend_source_page;
            }
            html += '<div class="swiper-slide">';
            html += '<div class="recommended-main"><a class="recommended-a" href=' + url + ' target="_black"> <img class="recommended-img" src=' + products[i].image_url + ' />';
            html += '<p class="recommended-p">' + products[i].title + '</p>';
            html += '<span style="font-size: 16px;font-weight: 100;margin-right:10px;text-decoration: line-through;">' + all_data.currency_symbol + '' + products[i].origin_price + '</span>';
            html += '<span style="font-size: 16px;font-weight: 100;color: #ea0606;">' + all_data.currency_symbol + '' + products[i].discount_price + '</span>';
            html += '</a></div>';
            html += '</div>';
            console.log(html);
        }
        html += '</div>';
        html += '<div class="swiper-pagination swiper-pagination"></div>';
        html += '</div>';
        html += '<div class="swiper-button-prev swiper-button-prev"></div>';
        html += '<div class="swiper-button-next swiper-button-next"></div>';
        html += '</div>';
        recommendedProduct.innerHTML = html;
        if (footer) {
            grid.insertBefore(recommendedProduct, footer);
        } else {
            grid.appendChild(recommendedProduct);
        }
        setSwiper();
    } else {
        console.log('false')
    }
}

function setSwiper() {
    var view = '';
    screen.width > 768 ? view = 3 : view = 2;
    var mySwiper = new Swiper('#my-swiper', {
        direction: 'horizontal',
        loop: true,
        slidesPerView: view,
        pagination: {
            el: '.swiper-pagination',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
}
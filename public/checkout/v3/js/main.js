if (window.Worker) {
  const worker = new Worker('worker.js');

  const shopifyUrl = '/shopify/v1/api/full/' + getProductId;
  const swiperUrl = '/shopify/v1/api/images/' + getProductId;
  // const shopifyUrl = '/shopify/v1/api/full/8924785377562';
  // const swiperUrl = '/shopify/v1/api/images/8924785377562';
  const urlObj = {
    shopifyUrl: shopifyUrl,
    swiperUrl: swiperUrl,
  };
  console.log(urlObj, 'urlObj');
  worker.postMessage({ cmd: 'fetchData', url: urlObj });

  worker.addEventListener('message', (e) => {
    const data = e.data;
    if (data.cmd === 'fetchComplete') {
      const { shopifyData, swiperData } = data.workerData;
      swiperDom(swiperData);
      shopifyDom(shopifyData);
    } else if (data.cmd === 'fetchError') {
      console.error('Error fetching data:', data.error);
    }
  });
} else {
  console.log('Your browser does not support Web Workers.');
}

function swiperDom(data) {
  console.log(data, '====swiperDom');
  var swiperList = '';
  swiperImgList = data.images;
  var img = data.images;
  for (var i = 0; i < img.length; i++) {
    swiperList += `<div class="swiper-slide"><img src="${img[i].src}" width="705" height="705" loading="lazy" alt=""></div>`;
  }
  var gallery =
    `<div class="swiper-container" style="width:100%" id="gallery">
  				<div class="swiper-wrapper">` +
    swiperList +
    `</div>
  			</div>`;
  var thumbs =
    `<div class="swiper-container" id="thumbs">
  				<div class="swiper-wrapper">` +
    swiperList +
    `</div>
  			</div>`;
  $('.sw-box').append(gallery, thumbs);
  galleryThumbs = new Swiper('#thumbs', {
    slidesPerView: 5,
    spaceBetween: 5,
    watchSlidesVisibility: true,
    loop: true,
  });

  mySwiper = new Swiper('#gallery', {
    direction: 'horizontal',
    loop: true,
    autoplay: true,
    allowTouchMove: true,
    thumbs: {
      swiper: galleryThumbs,
      allowTouchMove: true,
      slideThumbActiveClass: 'my-slide-thumb-active',
    },
  });
}
function shopifyDom(data) {
  console.log(data, '=====shopifyDom');
  const bodyHtml = data.body_html;
  const skeleton = document.querySelector('.shopify-container');
  const content = document.createElement('div');
  content.classList.add('shopify-content');
  content.innerHTML = bodyHtml;
  skeleton.replaceWith(content);
}

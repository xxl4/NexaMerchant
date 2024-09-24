// getProductId = '8924785377562';
const shopifyUrl = '/shopify/v1/api/full/' + getProductId;
const swiperUrl = '/shopify/v1/api/images/' + getProductId;
const reviewsrUrl = '/api/reviews?product_id=' + getProductId;
let image = '';
if (window.Worker) {
  const worker = new Worker('worker.js?v=1');
  const urlObj = {
    shopifyUrl: shopifyUrl,
    swiperUrl: swiperUrl,
    reviewsrUrl: reviewsrUrl,
  };
  console.log(urlObj, 'urlObj');
  worker.postMessage({ cmd: 'fetchData', url: urlObj });

  worker.addEventListener('message', (e) => {
    const data = e.data;
    if (data.cmd === 'fetchComplete') {
      const { shopifyData, swiperData, reviewsrData } = data.workerData;
      swiperDom(swiperData);
      shopifyDom(shopifyData);
      reviewDom(reviewsrData);
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
  image = img[0].src;
  for (var i = 0; i < img.length; i++) {
    swiperList += `<div class="swiper-slide"><img src="${img[i].src}" width="750" height="750" loading="lazy" alt=""></div>`;
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
  $('.sw-box').replaceWith(gallery, thumbs);
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
const prevPageBtn = document.getElementById('prev-page');
const nextPageBtn = document.getElementById('next-page');
const pageInfo = document.getElementById('page-info');
const pageInput = document.getElementById('page-input');
const jumpPageBtn = document.getElementById('jump-page');

let currentPage = 1;
let total = 0;
function reviewImgPreview(imgUrl) {
  console.log(imgUrl, 'imgUrl');
  $('.size-chart-img-box').show();
  $('.size-chart-img img').attr('src', imgUrl);
}
function reviewDom(data) {
  console.log(data, 'reviewDom');
  let reviewsDom = '';
  for (const key in data.reviews) {
    if (Object.hasOwnProperty.call(data.reviews, key)) {
      let reviewsImg = '';
      if (data.reviews[key].images.length > 0) {
        data.reviews[key].images.forEach((element) => {
          reviewsImg +=
            `
          <img style="width: 30%;  max-height:120px;object-fit:contain" onclick="reviewImgPreview('${element.url}')" src="` +
            element.url +
            `" loading="lazy" alt="" />
        `;
        });
      } else {
        reviewsImg = '';
      }
      reviewsDom +=
        `
      <div class="comment-card" style="background-color: #F4F4F4">
    <div style="display: flex">
      <div class="mr4" style="font-size: 14px;margin-top: 3px;color: #444444; ">
        ${data.reviews[key].name}
        <i class="flag-icon-size flag-icon flag-icon-` +
        countries1 +
        ` mr-2"></i>
      </div>
      <div style="margin-top:2px">
        <img style="margin-left:5px" class="mb1 mr2" width="14px" src="/checkout/onebuy/images/icon_gou.svg" loading="lazy" alt="" />
        <span style="width: 100%; font-size:12px; color: #444444">` +
        reviewLang +
        `</span>
      </div>
    </div>
    <div>
      <div style="text-align: start; width: 100%;">
        <img width="110px" src="/checkout/onebuy/images/stars-5.svg" loading="lazy" alt="" />
      </div>
      <div class="cardtext" style="text-align: start;">` +
        data.reviews[key].comment +
        `</div>
      ${reviewsImg}
    </div>
  </div>
      `;
    }
  }
  $('.reviews-content').html(reviewsDom);
  if (reviewsDom !== '') {
    $('.pagination').show();
  }
  total = data.total;
  const totalNum = Math.ceil(total / 10);
  pageInfo.textContent = `${currentPage} / ${totalNum}`;
  $('#page-input').attr('max', totalNum);
}
async function getReviews(page) {
  page = page - 1;
  const url = reviewsrUrl + '&page=' + page;
  try {
    const response = await fetch(url);
    const data = await response.json();
    console.log(data, '===============getReviewsData==============');
    if (data.code == 200) {
      return data.data;
    }
  } catch (error) {
    console.log(error.message, 'getReviewsData ==== err');
  }
}
function updatePaginationInfo(total) {
  pageInfo.textContent = `${currentPage} / ${Math.ceil(total / 10)}`;
}

async function handlePageChange(page) {
  const data = await getReviews(page);
  console.log(data, 'handlePageChange');
  reviewDom(data);
  // fetchComments(page).then((data) => {
  currentPage = page;
  updatePaginationInfo(data.total);
  prevPageBtn.disabled = currentPage === 1;
  nextPageBtn.disabled = currentPage === Math.ceil(total / 10);
  console.log(Math.ceil(total / 10));
  console.log(nextPageBtn.disabled, 'nextPageBtn.disabled');

  // });
}
prevPageBtn.addEventListener('click', () => {
  if (currentPage > 1) {
    handlePageChange(currentPage - 1);
  }
});

nextPageBtn.addEventListener('click', () => {
  handlePageChange(currentPage + 1);
});

jumpPageBtn.addEventListener('click', () => {
  const page = parseInt(pageInput.value, 10);
  console.log(page, 'page');
  if (isNaN(page) || page < 1 || page > Math.ceil(total / 10)) {
    alert(reviewErrMsg);
    return;
  }
  handlePageChange(page);
});

console.log(data.sellPoints, 'data.sellPoints===========');
let description = '';
for (const key in data.sellPoints) {
  if (Object.hasOwnProperty.call(data.sellPoints, key)) {
    description += `${key}.${data.sellPoints[key]}`;
  }
}
console.log(description);

function shareOnFacebook() {
  const url = window.location.href;
  console.log(url, '====url');
  const title = document.getElementsByClassName('prod-name').innerText;
  console.log(title, '====title====');
  const shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}&title=${encodeURIComponent(title)}&description=${encodeURIComponent(
    description
  )}&picture=${encodeURIComponent(image)}`;
  window.open(shareUrl, '_blank');
}

function shareOnLinkedIn() {
  const url = window.location.href;
  const title = document.getElementsByClassName('prod-name').innerText;
  console.log(title, '====title====');
  const shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}&title=${encodeURIComponent(
    title
  )}&summary=${encodeURIComponent(description)}`;
  window.open(shareUrl, '_blank');
}

function shareOnTwitter() {
  const url = window.location.href;
  const title = document.getElementsByClassName('prod-name').innerText;
  console.log(title, '====title====');
  const shareUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`;
  window.open(shareUrl, '_blank');
}

function shareByEmail() {
  const url = window.location.href;
  const title = document.getElementsByClassName('prod-name').innerText;
  console.log(title, '====title====');
  const subject = `Check out this product: ${title}`;
  const body = `I found this amazing product:\n\n${title}\n\n${description}\n\n${url}`;
  const shareUrl = `mailto:?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
  window.location.href = shareUrl;
}

function shareOnPinterest() {
  const url = window.location.href;
  const shareUrl = `https://pinterest.com/pin/create/button/?url=${encodeURIComponent(url)}&media=${encodeURIComponent(image)}&description=${encodeURIComponent(
    description
  )}`;
  window.open(shareUrl, '_blank');
}

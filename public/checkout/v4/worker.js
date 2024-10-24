self.addEventListener('message', async function (e) {
  const data = e.data;
  if (data.cmd === 'fetchData') {
    try {
      let shopifyData = await getShopifyData(data.url.shopifyUrl);
      let swiperData = await getSwiperData(data.url.swiperUrl);
      let reviewsrData = await getReviewsData(data.url.reviewsrUrl);
      const workerData = {
        shopifyData: shopifyData,
        swiperData: swiperData,
        reviewsrData: reviewsrData,
      };
      console.log(shopifyData, 'shopifyData===workerjs', swiperData, 'swiperData======workerjs');
      self.postMessage({ cmd: 'fetchComplete', workerData: workerData });
    } catch (error) {
      self.postMessage({ cmd: 'fetchError', error: error.message });
    }
  }
});

async function getShopifyData(url) {
  try {
    const response = await fetch(url);
    const data = await response.json();
    if (data.code == 200) {
      return data.data;
    }
  } catch (error) {
    console.log(error.message, 'getShopifyData ==== err');
  }
}

async function getSwiperData(url) {
  try {
    const response = await fetch(url);
    const data = await response.json();
    console.log(data, '===============workerjs22==============');
    if (data.code == 200) {
      return data.data;
    }
  } catch (error) {
    console.log(error.message, 'getSwiperData ==== err');
  }
}
async function getReviewsData(url) {
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

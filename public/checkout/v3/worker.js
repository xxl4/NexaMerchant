self.addEventListener('message', function (e) {
  const data = e.data;
  if (data.cmd === 'fetchData') {
    getShopifyData(data.url);
  }
});

async function getShopifyData(url) {
  try {
    // const shopifyUrl = '/shopify/v1/api/full/{{ $slug }}';
    const response = await fetch(url);
    const data = await response.json();
    console.log(data, '===============workerjs==============');
  } catch (error) {
    console.log(error.message, 'getShopifyData ==== err');
  }
}

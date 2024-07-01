if (window.Worker) {
  const worker = new Worker('worker.js');

  // const shopifyUrl = '/shopify/v1/api/full/{{ $slug }}';
  const shopifyUrl = '/shopify/v1/api/full/8924785377562';
  worker.postMessage({ cmd: 'fetchData', url: shopifyUrl });

  worker.addEventListener('message', (e) => {
    const data = e.data;
    if (data.cmd === 'fetchComplete') {
      console.log('Data fetched:', data.data);
      document.getElementById('result').textContent = JSON.stringify(data.data, null, 2);
    } else if (data.cmd === 'fetchError') {
      console.error('Error fetching data:', data.error);
      document.getElementById('result').textContent = 'Error: ' + data.error;
    }
  });
} else {
  console.log('您的浏览器不支持 Web Workers.');
}

// http://127.0.0.1:8000/api/reviews?product_id=8924785377562

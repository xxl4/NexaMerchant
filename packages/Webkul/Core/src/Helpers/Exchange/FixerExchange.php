<?php

namespace Webkul\Core\Helpers\Exchange;

<<<<<<< HEAD
use Webkul\Core\Helpers\Exchange\ExchangeRate;
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
use Webkul\Core\Repositories\CurrencyRepository;
use Webkul\Core\Repositories\ExchangeRateRepository;

class FixerExchange extends ExchangeRate
{
    /**
     * API key
<<<<<<< HEAD
     * 
     * @var string 
=======
     *
     * @var string
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    protected $apiKey;

    /**
     * API endpoint
<<<<<<< HEAD
     * 
     * @var string 
=======
     *
     * @var string
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    protected $apiEndPoint;

    /**
     * Create a new helper instance.
     *
<<<<<<< HEAD
     * @param  \Webkul\Core\Repositories\CurrencyRepository  $currencyRepository
     * @param  \Webkul\Core\Repositories\ExchangeRateRepository  $exchangeRateRepository
     * @return void
     */
    public function  __construct(
        protected CurrencyRepository $currencyRepository,
        protected ExchangeRateRepository $exchangeRateRepository
    )
    {
=======
     * @return void
     */
    public function __construct(
        protected CurrencyRepository $currencyRepository,
        protected ExchangeRateRepository $exchangeRateRepository
    ) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        $this->apiEndPoint = 'http://data.fixer.io/api';

        $this->apiKey = config('services.exchange_api')['fixer']['key'];
    }

    /**
     * Fetch rates and updates in currency_exchange_rates table
<<<<<<< HEAD
     * 
=======
     *
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return \Exception|void
     */
    public function updateRates()
    {
        $client = new \GuzzleHttp\Client();

        foreach ($this->currencyRepository->all() as $currency) {
            if ($currency->code == config('app.currency')) {
                continue;
            }

<<<<<<< HEAD
            $result = $client->request('GET', $this->apiEndPoint . '/' . date('Y-m-d') . '?access_key=' . $this->apiKey .'&base=' . config('app.currency') . '&symbols=' . $currency->code);
=======
            $result = $client->request('GET', $this->apiEndPoint . '/' . date('Y-m-d') . '?access_key=' . $this->apiKey . '&base=' . config('app.currency') . '&symbols=' . $currency->code);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

            $result = json_decode($result->getBody()->getContents(), true);

            if (
                isset($result['success'])
                && ! $result['success']
            ) {
                throw new \Exception($result['error']['info'] ?? $result['error']['type'], 1);
            }

            if ($exchangeRate = $currency->exchange_rate) {
                $this->exchangeRateRepository->update([
                    'rate' => $result['rates'][$currency->code],
                ], $exchangeRate->id);
            } else {
                $this->exchangeRateRepository->create([
                    'rate'            => $result['rates'][$currency->code],
                    'target_currency' => $currency->id,
                ]);
            }
        }
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

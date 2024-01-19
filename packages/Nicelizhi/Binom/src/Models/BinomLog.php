<?php
namespace Nicelizhi\Binom\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Core\Models\ChannelProxy;
use Konekt\Concord\Proxies\ModelProxy;
use Illuminate\Database\Eloquent\Model;
use Nicelizhi\Binom\Contracts\BinomLog as BinomLogContract;

class BinomLog extends Model implements BinomLogContract {

}
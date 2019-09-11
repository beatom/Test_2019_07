<?php
/**
 * @var array $config
 */

?>

<div>
    <div>Число {{$config['num']}}</div>

    @if($config['win'])
        Вы выграли - {{ $config['summ'] }}

    @else

        Вы проиграли

    @endif
</div>

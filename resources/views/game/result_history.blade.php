<?php
/**
 * @var array $games
 */

?>

<div>
    <table class="table">
        <tr>
            <th>Дата</th>
            <th>Победа</th>
            <th>Сумма</th>
            <th>Чсло</th>
        </tr>
        @foreach($games as $game)
            <tr>
                <td>{{$game->created_at}}</td>
                <td><?= ($game->win) ? 'Да' : 'Нет' ?></td>
                <td>{{$game->summ}}</td>
                <td>{{$game->num}}</td>
            </tr>
        @endforeach
    </table>
</div>

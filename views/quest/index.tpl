{extends file="../layout.tpl"}
{block name=body}
 <div class="quest_wrapper">
<div class="quest_container">
    {debug}
{*
==================================================================================
Если на данной странице ввобще есть в наличии хоть какие-то новости, то выводим их
==================================================================================
*}
{if (!empty($news['items']))}
    {foreach $news['items'] as $key=>$item}
        <div class="quest_element">
            {if !empty($item['quest_picture'])}
                <img class="quest_picture_short" src="../../web/img/{$item['quest_picture']}" alt="{$item['quest_title']}">
            {/if}
            <a href="/quest/show/{$item['id']}"><h1>{$item['quest_title']}</h1></a>
            <h2>{$item['quest_email']}</h2>
            <p>{$item['quest_text']}</p>

        </div>
    {/foreach}

    {* Тут лучше или обработчик, или редиррект, если успею до дедлайна, поменяю*}
    {else}
    <h1>На данной странице невостей нет. Перейдите пока на другую</h1>
    <div class="beforeMega"><a href="/"><button class="megaButton">Домой</button></a></div>
{/if}
</div>



    <div class="pagination_container ">
        <ul class="pagination_main">
            {if ($page<3)}
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/1">1</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/2">2</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/3">3</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/7">..</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/{$news['maxPages']}">
                    {$news['maxPages']}</a></li>
            {elseif ($page<=$news['maxPages']-3)}
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/{$page-1}">{$page-1}</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/{$page}">{$page}</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/{$page+1}">{$page+1}</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/{$page+3}">..</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/{$news['maxPages']}">
                        {$news['maxPages']}</a></li>
             {else}
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/1">1</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/{$page-3}">...</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/{$news['maxPages']-2}">{$news['maxPages']-2}</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/{$news['maxPages']-1}">{$news['maxPages']-1}</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/{$news['maxPages']}">
                        {$news['maxPages']}</a></li>
            {/if}
        </ul>
    </div>

 </div>
{/block}
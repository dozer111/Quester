{extends file="../layout.tpl"}
{block name="body"}
    <div class="quest_wrapper">
        {if (!empty($quest['quest_picture']))}
            <img class="quest_picture" src="../../web/img/{$quest['quest_picture']}" alt="{$quest['quest_title']}">
        {/if}
        <h1>{$quest['quest_title']}</h1>
        <p>{$quest['quest_text']}</p>

        <h3>
            {$quest['login']}
            {if ($quest['quest_author']==0)}
                {$quest['login']='guest'}
                {$quest['login']}
            {/if}

            <br>
        {$quest['quest_email']}
        </h3>

    </div>
    {debug}
{/block}
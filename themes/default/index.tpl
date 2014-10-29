<html>
    <head>
        {include file='head.tpl'}
    </head>
    <body>
        {include file='body.tpl'}
        {if $config.show_debug}
        {include file='debug.tpl'}
        {/if}
    </body>
</html>
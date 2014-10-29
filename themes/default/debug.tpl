<div id='debug-container'>
    {foreach from=$config.debug item=debug}
        <div>
            <p class='callstack'>
                <ol>
                    {foreach from=$debug.callstack item=stackItem}
                        <li>
                        @method: {$stackItem.class}{$stackItem.type}{$stackItem.function} |
                        @line: {$stackItem.file} ({$stackItem.line})
                        </li>
                    {/foreach}
                </ol>
            </p>
            <p class='value'>
            <pre>
                {$debug.value|trim}
            </pre>
            </p>
        </div>
    {/foreach}
</div>
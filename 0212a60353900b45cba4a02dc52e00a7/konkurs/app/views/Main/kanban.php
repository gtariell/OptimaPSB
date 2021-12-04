<!--Канбан-->
<div id="kanban" class="row h-100 pb-4">
    <div class="col-4 pe-0">
        <div class="panel border-gradient border-gradient-p d-flex flex-column text-uppercase" style="height: 100%">
            <h4 class="text-center">К выполнению</h4>
            <div id="sortable1" class="connectedSortable">
            <?php if (!empty($issues['К выполнению'])) foreach ($issues['К выполнению'] as $issue):?>
                    <div class="card bg-1 mt-3" data-key="<?= $issue['key'] ?>">
                        <div class="card-body">
                            <div class="date">
                                <div class="text-muted" style="font-size: 7px;">Старт:</div>
                                <div class="d-flex">
                                    <div style="font-size: 24px;line-height: 1;font-weight: 900;padding-right: 4px;">02</div>
                                    <div class="d-flex flex-column">
                                        <div style="font-size: 8px;font-weight: 900;">декабря</div>
                                        <div style="font-size: 7px;">2021</div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3" style="font-weight: 900;font-size: 12px;"><?= $issue['summary'] ?></p>
                            <div class="long">
                                <div class="text-muted" style="font-size: 7px;">Срок обучения:</div>
                                <div style="font-size: 24px;font-weight: 900;line-height: 1;">1 день</div>
                            </div>
                        </div>
                    </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="col-4 pe-0">
        <div class="panel border-gradient border-gradient-p d-flex flex-column text-uppercase" style="height: 100%">
            <h4 class="text-center">В работе</h4>
            <div id="sortable2" class="connectedSortable">
            <?php if (!empty($issues['В работе'])) foreach ($issues['В работе'] as $issue):?>
                <div class="card bg-2 mt-3" data-key="<?= $issue['key'] ?>">
                    <div class="card-body">
                        <div class="date">
                            <div class="text-muted" style="font-size: 7px;">Старт:</div>
                            <div class="d-flex">
                                <div style="font-size: 24px;line-height: 1;font-weight: 900;padding-right: 4px;">02</div>
                                <div class="d-flex flex-column">
                                    <div style="font-size: 8px;font-weight: 900;">декабря</div>
                                    <div style="font-size: 7px;">2021</div>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3" style="font-weight: 900;font-size: 12px;"><?= $issue['summary'] ?></p>
                        <div class="long">
                            <div class="text-muted" style="font-size: 7px;">Срок обучения:</div>
                            <div style="font-size: 24px;font-weight: 900;line-height: 1;">1 день</div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="col-4 pe-0">
        <div class="panel border-gradient border-gradient-p d-flex flex-column text-uppercase" style="height: 100%">
            <h4 class="text-center">Готово</h4>
            <div id="sortable3" class="connectedSortable">
            <?php if (!empty($issues['Готово'])) foreach ($issues['Готово'] as $issue):?>
                <div class="card bg-3 mt-3" data-key="<?= $issue['key'] ?>">
                    <div class="card-body">
                        <div class="date">
                            <div class="text-muted" style="font-size: 7px;">Старт:</div>
                            <div class="d-flex">
                                <div style="font-size: 24px;line-height: 1;font-weight: 900;padding-right: 4px;">02</div>
                                <div class="d-flex flex-column">
                                    <div style="font-size: 8px;font-weight: 900;">декабря</div>
                                    <div style="font-size: 7px;">2021</div>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3" style="font-weight: 900;font-size: 12px;"><?= $issue['summary'] ?></p>
                        <div class="long">
                            <div class="text-muted" style="font-size: 7px;">Срок обучения:</div>
                            <div style="font-size: 24px;font-weight: 900;line-height: 1;">1 день</div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<style>
    .connectedSortable {
        height: 100%;
    }

    #kanban {
        background: url(/images/perc-blur.png) no-repeat 30% 100% / 35%;
    }
</style>

<script>
    $( function() {
        $( "#sortable1, #sortable2, #sortable3" ).sortable({
            connectWith: ".connectedSortable",
            receive: function( event, ui ) {
                let target = $(event.target).attr('id')
                let sender = $(ui.sender).attr('id')
                let key = $(ui.item).data('key')
                console.log($(ui.item))
                $(ui.item)
                    .removeClass(sender.replace('sortable','bg-'))
                    .addClass(target.replace('sortable','bg-'))
                // console.log(event, ui)
                console.log(`${sender} => ${target} (${key})`)

                $.post('/jira',{
                    id: key,
                    status: target.replace('sortable','')
                }, function( data ) {
                    console.log(data)
                });
            }
        }).disableSelection();
    } );
</script>
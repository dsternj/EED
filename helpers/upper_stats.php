<? include_once 'backend/upper_stats.php' ; ?>
<? include_once 'backend/search_count.php' ; ?>


<!-- upper main stats -->
            <div id="main-stats">
                <input class="search secondary span5" type="text" placeholder="busca resultados por profesor, curso o sigla" />
                <div class="row-fluid stats-row">
                    <div class="span3 stat">
                        <div class="data">
                            <span class="number"><? echo $count_classes ?></span>
                            ramos
                        </div>
                        <span class="date">Cursados</span>
                    </div>
                    <div class="span3 stat">
                        <div class="data">
                            <span class="number"><? echo count($answer_list) ?></span>
                            <? if (count($answer_list) == 1) { ?>
                            profesor
                        </div>
                        <span class="date">Evaluado</span>
                        <? } else { ?> 
                            profesores
                        </div>
                        <span class="date">Evaluados</span>
                        <? } ?>
                    </div>
                    
                    <div class="span3 stat">
                        <div class="data">
                            <span class="number"><? if($seachesLeft == 999999) echo "&infin;"; else echo $seachesLeft ?></span>
                            búsquedas
                        </div>
                        <span class="date">Restantes</span>
                    </div>
                    <div class="span3 stat last">
                        <div class="data">
                            <span class="number"><? echo $totalSearch ?></span>
                            búsquedas
                        </div>
                        <span class="date">Reaizadas</span>
                    </div>
                </div>
            </div>
            <!-- end upper main stats -->
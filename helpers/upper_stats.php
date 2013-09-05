<? include_once 'backend/upper_stats.php' ; ?>

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
                            <span class="number">25</span>
                            profesores
                        </div>
                        <span class="date">Evaluados</span>
                    </div>
                    <div class="span3 stat">
                        <div class="data">
                            <span class="number">22</span>
                            búsquedas
                        </div>
                        <span class="date">Restantes</span>
                    </div>
                    <div class="span3 stat last">
                        <div class="data">
                            <span class="number">8</span>
                            búsquedas
                        </div>
                        <span class="date">Reaizadas</span>
                    </div>
                </div>
            </div>
            <!-- end upper main stats -->
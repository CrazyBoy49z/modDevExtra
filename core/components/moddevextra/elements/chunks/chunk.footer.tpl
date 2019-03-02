    [[-+jsPlaceholder]]
    <footer class="container">
        <hr>
        <div class="row">
            <div class="col-xs-6">
                <p>&copy;
                    {var $year = '' | date : 'Y'}
                    {if $year == 2013}2013м{else}2013—{$year}{/if}
                    {$_modx->config.site_name}
                </p>
            </div>
            <div class="col-xs-6">
                <p class="text-right">
                    <small><a href="https://yura.finiv.in.ua/">[[++cultureKey:is=`ru`:then=`Финив Юрий`:else=`Yuriy Finiv`]]</a></small>
                </p>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>
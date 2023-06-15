<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profil Nauczyciela</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        <?php
                        echo $_SESSION["logged"]["role"];
                        ?>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><b>
                                        <?php
                                        echo $_SESSION["logged"]["Name"]." ".$_SESSION["logged"]["LastName"];
                                        ?>
                                    </b></h2>
                                <p class="text-muted text-sm"><?php
                                    echo $_SESSION["logged"]["Email"];
                                    ?>
                                </p>
                                <p class="text-muted text-sm"><?php
                                    echo $_SESSION["logged"]["DataUrodzenia"];
                                    ?></p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span><?php
                                        echo $_SESSION["logged"]["NumerTelefonu"];
                                        ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>


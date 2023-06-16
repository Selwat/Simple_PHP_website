<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profil Ucznia</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <span class="material-symbols-outlined">
                    account_circle
                </span>
            </div>
            <h3 class="profile-username text-center"> 
                <?php
                echo $_SESSION["logged"]["Name"]." ".$_SESSION["logged"]["LastName"];
                ?>
            </h3>
            <p class="text-muted text-center">
                <?php
                echo $_SESSION["logged"]["Email"];
                ?>
            </p>
            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Data Urodzenia</b> <a class="float-right">
                        <?php
                        echo $_SESSION["logged"]["DataUrodzenia"];
                        ?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Nr Telefonu</b> <a class="float-right">
                        <?php
                        echo $_SESSION["logged"]["NumerTelefonu"];
                        ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
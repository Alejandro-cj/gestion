<?php include_once 'Views/template/header.php'; ?>
<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="mailbox-container">

                        <!-- <div class="modal fade" id="composeModal" tabindex="-1" aria-labelledby="composeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="composeModalLabel">Compose Message</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <label for="composeEmailTo" class="form-label">Email address</label>
                                            <input type="email" class="form-control m-b-sm" id="composeEmailTo" aria-describedby="emailHelp">
                                            <label for="composeTitle" class="form-label">Subject</label>
                                            <input type="text" class="form-control m-b-lg" id="composeTitle" aria-describedby="title">
                                            <div id="compose-editor"></div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-success">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary btn-burger mailbox-compose-btn" data-bs-toggle="modal" data-bs-target="#composeModal"><i class="material-icons-outlined">create</i></button> -->

                        <div class="card">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="mailbox-list col-xl-3">
                                        <ul class="list-unstyled">
                                            <?php foreach ($data['archivos'] as $archivo) { ?>
                                            <li class="mailbox-list-item">
                                                <a href="#" id="<?php echo $archivo['id']; ?>" class="compartidos">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                    </div>
                                                    <img src="<?php echo BASE_URL . 'Assets/images/logo.png'; ?>" alt="">
                                                    <div class="mailbox-list-item-content">
                                                        <span class="mailbox-list-item-title">
                                                            <?php echo $archivo['nombre']; ?>
                                                        </span>
                                                        <p class="mailbox-list-item-text">
                                                        <?php echo $archivo['archivo']; ?>
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="mailbox-open-content col-xl-9" id="content-info">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'Views/template/footer.php'; ?>
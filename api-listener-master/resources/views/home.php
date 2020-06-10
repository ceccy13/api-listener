<?php include(app_path().'/../resources/views/includes/header.php'); ?>

    <input type="hidden" id="title" name="pageName" value="home" />

    <form role="form" data-toggle="validator" id="form-token" method="POST" action="<?php /*header("location: {$_SERVER['PHP_SELF']}"); */?>">

        <div class="form-group">
            <label id="label_token_default" for="comment">Token:</label>
            <label style="display: none" id="label_token_in_use" class="mc-label-valid-status" for="comment">Valid Token In Use</label>
            <label style="display: none" id="guest_waiting" class="mc-label-not-valid-status" for="comment">Api Is Locked By Another User!</label>
            <textarea disabled id="token" name="token" class="form-control" rows="10" cols="50" placeholder="" id="comment"><?= session()->get('token') ?></textarea>
            <div class="help-block">
                <?= $errors->first('token'); ?>
            </div>
            <input id="is_active_listener" name="is_active_listener" type="hidden" value="1"/>
        </div>

    </form>

    <div class="form-group">
        <div class="form-group">
            <label for="comment">Server Response Output:</label>
            <textarea disabled="disabled" class="form-control" rows="5" id="comment">
                 <?= empty($data['response']) ? null : $data['response']; ?>
            </textarea>
        </div>
    </div>

    <label for="comment">Approximately current token expired time</label>
    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="70"
             aria-valuemin="0" aria-valuemax="100" style="width:<?= empty($data['token_expired_time_percent']) ? null : $data['token_expired_time_percent']; ?>%">
             <?=  empty($data['token_expired_time_percent']) ? null : $data['token_expired_time_percent']; ?> %
        </div>
    </div>

    <div style="float: left;">
        <button onclick="" type="button" class="btn btn-success" id="submit">Start Api Listener</button>
        <button style="display: none" onclick="" type="button" class="btn btn-danger" id="stop">Stop Api Listener</button>
    </div>
    <div class="mc-label-recording-status">
        <label style="display: none" id="recording_status" class="mc-label-valid-status" for="comment">Responsed Data Is Recording</label>
    </div>

<?php include(app_path().'/../resources/views/includes/footer.php'); ?>

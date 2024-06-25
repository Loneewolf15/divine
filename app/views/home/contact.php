<?php require APPROOT . '/views/inc/header.php'; ?>
<!-- header-end -->

<div class="container z-index-3">
    <div class="row">

        <!-- parsonal-info-start -->
        <?php require APPROOT . '/views/inc/personal.php'; ?>
        <!-- personal-info-end -->

        <!-- resume-page-start -->
        <div class="col-xxl-8 col-xl-9">
            <div class="bostami-page-content-wrap">

                <!-- page title -->
                <div class="section-wrapper pl-60 pr-60 pt-60">
                    <div class="bostami-page-title-wrap mb-15">
                        <h2 class="page-title">contact</h2>
                    </div>
                </div>

                <!-- contact form -->
                <div class="section-wrapper pr-60 pl-60 mb-60">
                    <div class="contact-area bg-light-white-2">
                        <?php if (flash('contact_success')): ?>
                        <div class="alert alert-success" style="color: green;">
                            <?php echo flash('contact_success'); ?>
                        </div>
                        <?php endif; ?>
                        <h5 class="contact-title">I'm always open to discussing produuct</h5>
                        <h5 class="contact-title-b">design work or partnerships.</h5>
                        <form class="contact-form" action="<?php echo URLROOT; ?>/home/contact" method="post">
                            <div class="form-input-item mb-60">
                                <label class="input-lebel name">name *</label>
                                <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                                <input name="name" value="<?php echo $data['name']; ?>"
                                    class="input-box name <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"
                                    type="text" required>
                            </div>
                            <div class="form-input-item mb-60">
                                <label class="input-lebel gmail">Email *</label>
                                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                                <input name="email" value="<?php echo $data['email']; ?>"
                                    class="input-box gmail <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                                    type="Email" required>
                            </div>
                            <div class="form-input-item mb-40">
                                <label class="input-lebel message">Message *</label>
                                <span class="invalid-feedback"><?php echo $data['message_err']; ?></span>
                                <textarea name="message"
                                    class="input-box message <?php echo (!empty($data['message_err'])) ? 'is-invalid' : ''; ?>"
                                    cols="30" rows="10"><?php echo $data['message']; ?></textarea>
                            </div>
                            <div class="form-btn-wrap">
                                <button type="submit" value="Send" class="form-btn">submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- footer copyright -->
                <?php require APPROOT . '/views/inc/footer.php'; ?>
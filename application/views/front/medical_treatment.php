<div class="main-content">

    <section class="inner-header divider layer-overlay overlay-deep" data-bg-img="<?=base_url()?>assets/front/images/bg/bg5.jpg">
        <div class="container pt-60 pb-60">
            <div class="section-content">
                <div class="row"> 
                    <div class="col-md-12 xs-text-center">
                        <ol class="breadcrumb mt-10 white">
                            <li><a href="#">Home</a></li>
                            <li class="active text-theme-colored"><?php echo $list->title; ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <style>

li.medical-t a {
    border: 1px solid #0293a6;
    display: block;
    padding: 5px 15px;
    margin-bottom: 10px;
    background: #0293a6;
    color: #fff;
    font-weight: bold;
}
li.medical-t a:hover{
    background: #fff;
    color: #0293a6;
}
.fix-hi {
    margin-top: 30px;
    height: 1404px;
    overflow: auto;
}
    </style>

    <section>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-3">
    			<h3 style="
    border: 1px solid;
    padding: 5px 15px;
    margin: 30px 0 10px;
    font-size: 20px;
">Medical Treatments</h3>
    			<ul class="medical-tl">
    			<?php foreach($this->medicals->medicals as $lists):  ?>
                             <li class="medical-t"><a href="<?php echo base_url(); ?>medical/treatments/<?php $x = strtolower($lists->title); $y = str_replace(' ', '_', $x); echo $y; ?>"><?php echo $lists->title; ?></a></li>
                        <?php endforeach; ?>
                        </ul>
    			</div>
    			<div class="col-md-6">
    			<div class="fix-hi">
                            <img width="100%" src="<?=base_url()?>uploads/front/medical_treatments/<?php echo $list->img; ?>" alt="" />
							
                            <h3><?php echo $list->title; ?></h3>
                            <?php echo $list->desc; ?>
                </div>
                </div>
    			<div class="col-md-3">
                    
                    <div class="enquer-box p-15 mb-10 mt-30 bg-info">
                        <h4 class="text-title pb-10 m-0" >ENQUERY </h4>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="phone" class="form-control" id="exampleInputPhone1" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Query" rows="2"></textarea>
                            </div>
                            <button type="submit" class="btn btn-colored btn-theme-colored m-0">Submit</button>
                        </form>
                    </div>

                    <div class="mb-10 p-15 pb-20 bg-1">
                        <h4 class="pb-10 m-0">Our International Hospital & Partners</h4>
                        <table cellpadding="10" cellspacing="10">
                            <tr>
                                <td colspan="3"><h5 class="new-h"><a href="">India <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></h5></td>
                            </tr>
                            <tr>
                                <td><abbr title="Apollo Hospitals"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member1.jpg" align="middle"></a></abbr></td>
                                <td><abbr title="Max Hospitals"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member2.jpg" align="middle"></a></abbr></td>
                                <td><abbr title="Fortis Hospitals"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member3.jpg" align="middle"></a></abbr></td>
                            </tr>
                            <tr>
                                <td colspan="3"><h5 class="new-h"><a href="">Malaysia <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></h5></td>
                            </tr>
                            <tr>
                                <td><abbr title="Medanta Hospitals"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member4.jpg" align="middle"></a></abbr></td>
                                <td><abbr title="Artemis Hospitals"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member5.jpg"></a></abbr></td>
                                <td><abbr title="Columbia Asia Hospitals"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member6.jpg" align="middle"></a></abbr></td>
                            </tr>
                            <tr>
                                <td colspan="3"><h5 class="new-h"><a href="">Thailand <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></h5></td>
                            </tr>
                            <tr>
                                <td><abbr title="BLK Super Speciality Hospital"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member7.jpg" align="middle"></a></abbr></td>
                                <td><abbr title="Kokilaben Dhirubhai Ambani Hospital"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member8.jpg" align="middle"></a></abbr></td>
                                <td><abbr title="Nova Specialty Hospitals "><a href=""><img src="<?=base_url()?>assets/front/images/clients/member9.jpg" align="middle"></a></abbr></td>
                            </tr>
                            <tr>
                                <td colspan="3"><h5 class="new-h"><a href="">Singapore <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></h5></td>
                            </tr>
                            <tr>
                                <td><abbr title="Spine & Brain India"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member10.jpg" align="middle"></a></abbr></td>
                                <td><abbr title="Vasan Eye Care"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member11.jpg"></a></abbr></td>
                                <td><abbr title="NIRVANA"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member12.jpg" align="middle"></a></abbr></td>
                            </tr>
                        </table>
                    </div>
                    

                    <div class="mb-10 bg-bordered bg-info">

                        <h4 class="p-10 m-0 bg-info" >Advanced Technology</h4>
                        <div class="p-10 pb-0">
                            <iframe width="100%" height="80px"  src="https://www.youtube.com/embed/O5U4Lq8-9b0" frameborder="0" allowfullscreen></iframe>
                            <br>
                        </div>
                    </div>

                        <div class=" bg-bordered bg-info">

                            <h4 class="p-10 m-0 bg-info" >bangladesh tour</h4>
                            <div class="p-10 pb-0">
                                <iframe width="100%" height="80px"  src="https://www.youtube.com/embed/xqh6gO30v1c" frameborder="0" allowfullscreen></iframe>
                                <br>
                                <!--<a class="btn btn-colored btn-theme-colored m-0" href="">View more</a>-->
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="section-content ">
	     <?php echo $list->table; ?> 
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="section-content ">
                <div class="row">
                    <h2 align="center">Inclusions and Exclusions</h2>
                    <div class="col-md-6">
                        <h4 class="text-uppercase text-theme-colored title-border m-0">INCLUSIONS</h4>
                        1. Airport Pick-up on Arrival in India<br>
                        2. Airport Drop on Departure from India<br>
                        3. Cost of initial Evaluation and Diagnosis<br>
                        4. Cost of the Surgery or Treatment<br>
                        5. Cost of applicable one implant/prosthesis<br>
                        6. OT Charges and Surgeon’s Fees<br>
                        7. Consultation Fees of the Doctor for the concerned specialty<br>
                        8. Nursing and Dietician’s Charges<br>
                        9. Hospital Stay for the specified number of days in the respective room category as mentioned against the package<br>
                        10. Hospital stay includes stay of the patient and one attendant for the duration of stay mentioned against the package<br>
                        11. Routine investigations and medicines related to the surgery or treatment.<br>
                        12. Food for the patient and the attendant for the specified number of days as mentioned against the package<br>
                        13. Travel Assistance/Medical Visa Invite/FRRO/ Visa Extensions<br>
                        14. Assistance in finding right budget hotel or guest house accommodation.<br>
                        15. Issuing Invitation Letter for Medical Visa.
                    </div>
                    <div class="col-md-6">
                        <h4 class="text-uppercase text-theme-colored title-border m-0">EXCLUSIONS</h4>
                        1. All expenses for stay beyond the specified number of days<br>
                        2. Cross Consultations other than the specified specialty<br>
                        3. Use of special drugs and consumables<br>
                        4. Blood products<br>
                        5. Any other additional procedure<br>
                        6. Post discharge consultations, medicines, procedures and follow-ups<br>
                        7. Treatment of any unrelated illness or procedures other than the one for which this estimate has been prepared<br>
                        8. Travel Expenses and Hotel Stay
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-uppercase text-theme-colored title-border m-0">DISCLAIMER:</h4>
                        <p>* Quote given is ONLY for the treatment in the hospital and DOES NOT include food as well as the accommodation cost outside the hospital.<br>
                            * The quote may vary in case of co-morbidities, which are associated medical conditions and an extended stay.<br>
                            * The treatment suggested is as per the information and reports provided to us. The line of treatment may differ according to the additional and comprehensive details asked by our consultants.<br>
                            * The prices quoted are only indicative and may differ. They can be confirmed only after the patient is assessed by a doctor.<br>
                            * The complete treatment cost has to be deposited in advance after the finance counseling for the patient is done at the hospital</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
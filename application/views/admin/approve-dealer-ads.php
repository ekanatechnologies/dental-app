<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="app-main__outer">
    <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="metismenu-icon pe-7s-diamond icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Approve Dealers ads
                            <div class="page-title-subheading">This is a list of ads waiting for approval by admin.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">Pending ads list</h5>
                            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Dealer Id</th>
                                        <th>Dealer Name</th>
                                        <th>Ads title</th>
                                        <th>Ads Desciption</th>
                                        <th>Price</th>
                                        <th>View Ad</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>ABC101</td>
                                        <td>Mark sodales</td>
                                        <td>Mark sodales cursus sit amet a nulla. Sed neque odio, viverra non ultricies at,</td>
                                        <td>Praesent mollis consectetur tortor. Cras ultricies purus et diam feugiat vulputate. Maecenas at libero ut velit sodales cursus sit amet a nulla. Sed neque odio, viverra non ultricies at,</td>
                                        <td>$49</td>
                                        <td><button class="mb-2 mr-2 btn btn-success active">View
                                        </button></td>
                                        <td><button class="mb-2 mr-2 btn btn-primary active">Approve
                                        </button><button class="mb-2 mr-2 btn btn-danger active">Reject
                                        </button></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>ABC101</td>
                                        <td>Mark sodales</td>
                                        <td>Jacob sodales cursus sit amet a nulla. Sed neque odio, viverra non ultricies at,</td>
                                        <td>Thornton Praesent mollis consectetur tortor. Cras ultricies purus et diam feugiat vulputate. Maecenas at libero ut velit sodales cursus sit amet a nulla. Sed neque odio, viverra non ultricies at,</td>
                                        <td>$123</td>
                                        <td><button class="mb-2 mr-2 btn btn-success active">View
                                        </button></td>
                                        <td><button class="mb-2 mr-2 btn btn-primary active">Approve
                                        </button><button class="mb-2 mr-2 btn btn-danger active">Reject
                                        </button></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>ABC101</td>
                                        <td>Mark sodales</td>
                                        <td>Larry sodales cursus sit amet a nulla. Sed neque odio, viverra non ultricies at,</td>
                                        <td>the Bird Praesent mollis consectetur tortor. Cras ultricies purus et diam feugiat vulputate. Maecenas at libero ut velit sodales cursus sit amet a nulla. Sed neque odio, viverra non ultricies at,</td>
                                        <td>$334</td>
                                        <td><button class="mb-2 mr-2 btn btn-success active">View
                                        </button></td>
                                        <td><button class="mb-2 mr-2 btn btn-primary active">Approve
                                        </button><button class="mb-2 mr-2 btn btn-danger active">Reject
                                        </button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
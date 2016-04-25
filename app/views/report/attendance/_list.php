<div class="invoice">
  <div class="row invoice-logo">
    <div class="col-xs-6 invoice-logo-space">
      <img src="<?php echo base_url();?>/assets/img/invoice/walmart.png" alt="" />
    </div>
    <div class="col-xs-6">
      <!--<p>
                 28 Feb 2013
                <span class="muted">
                  Classes List
                </span>
              </p>-->
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">
      <table id="ClassGrid" class="table table-striped table-hover">
        <thead>
          <tr>
            <th class='hidden-480'>Code</th>
            <th class='hidden-480'>Class Name</th>
            <th class='hidden-480'>Sections</th>
            <th class='hidden-480'>Batches</th>
            <th class='hidden-480'>Grading System</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>CL-01</td>
            <td>
              Class 1
            </td>
            <td>
              <span class="label label-danger">Green House</span>
              <br/>
              <br/>
              <span class="label label-success">Blue House</span>
              <br/>
              <br/>
              <span class="label label-warning">Red House</span>
            </td>
            <td>
              <span class="label label-default">2016-2017</span>
              <br/>
              <br/>
              <span class="label label-primary">2015-2016</span>
            </td>

            <td>GPA</td>

          </tr>
          <tr>
            <td>CL-02</td>
            <td>
              Class 2
            </td>
            <td>
              <span class="label label-danger">Green House</span>
              <br/>
              <br/>
              <span class="label label-success">Blue House</span>
              <br/>
              <br/>
              <span class="label label-warning">Red House</span>
            </td>
            <td>
              <span class="label label-default">2016-2017</span>
              <br/>
              <br/>
              <span class="label label-primary">2015-2016</span>
            </td>
            <td>GPA</td>

          </tr>
          <tr>
            <td>CL-03</td>
            <td>
              Class 3
            </td>
            <td>
              <span class="label label-danger">Green House</span>
              <br/>
              <br/>
              <span class="label label-success">Blue House</span>
              <br/>
              <br/>
              <span class="label label-warning">Red House</span>
            </td>
            <td>
              <span class="label label-default">2016-2017</span>
              <br/>
              <br/>
              <span class="label label-primary">2015-2016</span>
            </td>
            <td>GPA</td>

          </tr>
          <!--<?php foreach($Class as $employee){?>
                          <tr>
                            <td>
                              <?php echo $employee->ClassId;?>
                            </td>
                            <td>
                              <?php echo $employee->FirstName;?>
                            </td>
                          </tr>
                         <?php } ?>-->
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-4">
      <div class="well">
        <address>
          <strong>Loop, Inc.</strong><br/>
          795 Park Ave, Suite 120<br/>
          San Francisco, CA 94107<br/>
          <abbr title="Phone">P:</abbr> (234) 145-1810
        </address>
        <address>
          <strong>Full Name</strong>
          <br/>
          <a href="mailto:#">first.last@email.com</a>
        </address>
      </div>
    </div>
    <div class="col-xs-8 invoice-block">
      <!--<ul class="list-unstyled amounts">
                <li>
                  <strong>Sub - Total amount:</strong> $9265
                </li>
                <li>
                  <strong>Discount:</strong> 12.9%
                </li>
                <li>
                  <strong>VAT:</strong> -----
                </li>
                <li>
                  <strong>Grand Total:</strong> $12489
                </li>
              </ul>-->
      <br/>
      <a class="btn btn-lg btn-info hidden-print" onclick="javascript:window.print();">
        Print <i class="fa fa-print"></i>
      </a>
      <!--<a class="btn btn-lg btn-success hidden-print">
                Submit Your Invoice <i class="fa fa-check"></i>
              </a>-->
    </div>
  </div>


  <!--<div class="row">
            <div class="col-xs-4">
              <h4>Client:</h4>
              <ul class="list-unstyled">
                <li>
                  John Doe
                </li>
                <li>
                  Mr Nilson Otto
                </li>
                <li>
                  FoodMaster Ltd
                </li>
                <li>
                  Madrid
                </li>
                <li>
                  Spain
                </li>
                <li>
                  1982 OOP
                </li>
              </ul>
            </div>
            <div class="col-xs-4">
              <h4>About:</h4>
              <ul class="list-unstyled">
                <li>
                  Drem psum dolor sit amet
                </li>
                <li>
                  Laoreet dolore magna
                </li>
                <li>
                  Consectetuer adipiscing elit
                </li>
                <li>
                  Magna aliquam tincidunt erat volutpat
                </li>
                <li>
                  Olor sit amet adipiscing eli
                </li>
                <li>
                  Laoreet dolore magna
                </li>
              </ul>
            </div>
            <div class="col-xs-4 invoice-payment">
              <h4>Payment Details:</h4>
              <ul class="list-unstyled">
                <li>
                  <strong>V.A.T Reg #:</strong> 542554(DEMO)78
                </li>
                <li>
                  <strong>Account Name:</strong> FoodMaster Ltd
                </li>
                <li>
                  <strong>SWIFT code:</strong> 45454DEMO545DEMO
                </li>
                <li>
                  <strong>V.A.T Reg #:</strong> 542554(DEMO)78
                </li>
                <li>
                  <strong>Account Name:</strong> FoodMaster Ltd
                </li>
                <li>
                  <strong>SWIFT code:</strong> 45454DEMO545DEMO
                </li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>
                      #
                    </th>
                    <th>
                      Item
                    </th>
                    <th class="hidden-480">
                      Description
                    </th>
                    <th class="hidden-480">
                      Quantity
                    </th>
                    <th class="hidden-480">
                      Unit Cost
                    </th>
                    <th>
                      Total
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      1
                    </td>
                    <td>
                      Hardware
                    </td>
                    <td class="hidden-480">
                      Server hardware purchase
                    </td>
                    <td class="hidden-480">
                      32
                    </td>
                    <td class="hidden-480">
                      $75
                    </td>
                    <td>
                      $2152
                    </td>
                  </tr>
                  <tr>
                    <td>
                      2
                    </td>
                    <td>
                      Furniture
                    </td>
                    <td class="hidden-480">
                      Office furniture purchase
                    </td>
                    <td class="hidden-480">
                      15
                    </td>
                    <td class="hidden-480">
                      $169
                    </td>
                    <td>
                      $4169
                    </td>
                  </tr>
                  <tr>
                    <td>
                      3
                    </td>
                    <td>
                      Foods
                    </td>
                    <td class="hidden-480">
                      Company Anual Dinner Catering
                    </td>
                    <td class="hidden-480">
                      69
                    </td>
                    <td class="hidden-480">
                      $49
                    </td>
                    <td>
                      $1260
                    </td>
                  </tr>
                  <tr>
                    <td>
                      3
                    </td>
                    <td>
                      Software
                    </td>
                    <td class="hidden-480">
                      Payment for Jan 2013
                    </td>
                    <td class="hidden-480">
                      149
                    </td>
                    <td class="hidden-480">
                      $12
                    </td>
                    <td>
                      $866
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="well">
                <address>
                  <strong>Loop, Inc.</strong><br/>
                  795 Park Ave, Suite 120<br/>
                  San Francisco, CA 94107<br/>
                  <abbr title="Phone">P:</abbr> (234) 145-1810
                </address>
                <address>
                  <strong>Full Name</strong>
                  <br/>
                  <a href="mailto:#">first.last@email.com</a>
                </address>
              </div>
            </div>
            <div class="col-xs-8 invoice-block">
              <ul class="list-unstyled amounts">
                <li>
                  <strong>Sub - Total amount:</strong> $9265
                </li>
                <li>
                  <strong>Discount:</strong> 12.9%
                </li>
                <li>
                  <strong>VAT:</strong> -----
                </li>
                <li>
                  <strong>Grand Total:</strong> $12489
                </li>
              </ul>
              <br/>
              <a class="btn btn-lg btn-info hidden-print" onclick="javascript:window.print();">
                Print <i class="fa fa-print"></i>
              </a>
              <a class="btn btn-lg btn-success hidden-print">
                Submit Your Invoice <i class="fa fa-check"></i>
              </a>
            </div>
          </div>-->
</div>
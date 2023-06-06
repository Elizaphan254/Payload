@extends('admin.layout.app')

@section('title') Create Employee @endsection

@section('css')

<style type="text/css">
    .overflow-visible{
        overflow: visible !important;
    }
    .modal-sm{
      width: auto;
      max-width: 356px !important;
    }
    .select2-container--default {
      display: block;
      width: auto !important;
    }
    
    tbody.ui-rct-details {
      /* width: auto; */
      border-bottom: 1px solid #ccc;
      display: table-cell;
      /* border-right: 1px dotted #ccc; */
    }
</style>
@endsection

@section('content')
  <div class="page-header">
    <div class="row align-items-end">
      <div class="col-lg-8">
          <div class="page-header-title">
            <i class="ik ik-users bg-blue"></i>
            <div class="d-inline">
                <h5>Employees</h5>
                <span>Create Employee, Please fill all field correctly.</span>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
      <nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('admin.dashboard') }}"><i class="ik ik-home"></i></a>
          </li>
          <li class="breadcrumb-item">
              <a href="{{ route('admin.employee.index') }}">Employees</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
      </ol>
      </nav>
    </div>
  </div>
<br>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xl-12">
        
        <div class="widget overflow-visible">
            <div class="progress progress-sm progress-hi-3 hidden">
                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
            </div>
            <div class="widget-body">
                <div class="overlay hidden">
                    <i class="ik ik-refresh-ccw loading"></i>
                    <span class="overlay-text">New Employee Creating...</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h5 class="text-secondary">Create Employee</h5>
                    </div>
                </div>
                
                <form class="form_employee" action="{{route('admin.employee.store')}}" method="POST" enctype="multipart/form-data">
									{{csrf_field()}}
                  <div class="row">
                      <div class="col-md-8">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <!-- <label for="staffno">Staff No.</label><small class="text-danger">*</small> -->
                                <span class="input-group-text bg-info text-white">Staff No.<small class="text-danger">*</small></span>                              
                                <input type="text" name="staffno" class="form-control" id="staffno" placeholder="AUTO" value ="AUTO" {{Brkepay::get_auto_numbers()->stauto? 'readonly':''}}>
                                <small class="text-danger err" id="staffno-err"></small>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-text bg-info text-white">Status<small class="text-danger">*</small></span>                              
                                <select class="form-control" id="status" name="status" required>
                                    <option selected value disabled>choose</option>
                                    <option value="1">Active</option>
                                    <option value="0">Terminated</option>
                                  </select>
                                <small class="text-danger err" id="status-err"></small>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-text bg-success text-white">Pin No</span>                              
                                <input type="text" name="pinno" class="form-control" id="pinno" placeholder="Tax Number">
                                <small class="text-danger err" id="pinno-err"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-text bg-info text-white">Staff Names<small class="text-danger">*</small></span>
                                <input type="text" name="staffnames" class="form-control" id="staffnames" placeholder="Kimathi Kimakia" autocomplete="off">
                                <small class="text-danger err" id="staffnames-err"></small>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-text bg-success text-white">NHIF</span>
                                <input type="text" name="nhifno" class="form-control" id="nhifno" placeholder="nhif number">
                                <small class="text-danger err" id="nhifno-err"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-text bg-info text-white">Id No.<small class="text-danger">*</small></span>
                                <input type="text" name="idno" class="form-control" id="idno" placeholder="identification" autocomplete="off">
                                <small class="text-danger err" id="idno-err"></small>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-text bg-info text-white">Passport</span>
                                <input type="text" name="ppno" class="form-control" id="ppno" placeholder="passport">
                                <small class="text-danger err" id="ppno-err"></small>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-text bg-success text-white">NSSF</span>
                                <input type="text" name="nssfno" class="form-control" id="nssfno" placeholder="nssf">
                                <small class="text-danger err" id="nssfno-err"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-text bg-info text-white">Gender<small class="text-danger">*</small></span>
                                <select class ="form-control gender" name="gender" id="gender" required>
                                  <option value="M">Male</option>
                                  <option value="F">Female</option>
                                </select>
                                <small class="text-danger err" id="gender-err"></small>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-text bg-info text-white">Nationality</span>
                                <input type="text" class="form-control" name ="nationality" id="nationality">
                                <small class="text-danger err" id="nationality-err"></small>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-text bg-success text-white">Position<small class="text-danger">*</small></span>
                                <select class ="form-control department" name="department" id="department" required>
                                  @foreach($departments as $department)
                                    <option value="{{$department->title}}">{{$department->title}}-{{$department->description}}</option>
                                  @endforeach
                                </select>
                                <small class="text-danger err" id="department-err"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-text bg-info text-white">D.O.B<small class="text-danger">*</small></span>
                                <input type="text" class="form-control" name="dob" id="dob" value ="{{$dobDEFAULT}}">
                                <small class="text-danger err" id="dob-err"></small>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-text bg-success text-white">Marital</span>
                                <select class ="form-control" name="marital" id="marital">
                                  <option value="0" selected>Single</option>
                                  <option value="1" >Married</option>
                                  <option value="2" >Divorced</option>
                                  <option value="9" >Rather not say</option>
                                </select>
                                <small class="text-danger err" id="marital-err"></small>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-text bg-success text-white">W.E.F Date<small class="text-danger">*</small></span>
                                <input type="text" class="form-control" name="empdate" id="empdate" value ="{{$today}}">
                                <small class="text-danger err" id="empdate-err"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="container-fluid" style="border:1px solid #DBDDE0;">
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="no_relief" name="no_relief" value="">
                                  <label class="form-check-label">Relief Exempt</label>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="nhif_relief" name="nhif_relief" value="" checked>
                                  <label class="form-check-label">NHIF Relief</label>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="paye" name="paye" value="" checked>
                                    <label class="form-check-label">Paye</label>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="nhif" name="nhif" value="" checked>
                                  <label class="form-check-label">NHIF</label>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="nssf" name="nssf" value="" checked>
                                    <label class="form-check-label">NSSF</label>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="container-fluid input-group-text text-primary" style="border:1px solid #DBDDE0;">
                                  <label for="container-fluid" class="text-primary">Paye Scale Mode</label>    
                                    <div class="col-md-12">
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="payetype" id="payetype1" value="1" checked/>
                                        <label class="form-check-label" for="payetype1">Normal Scaler</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="payetype" id="payetype0" value="0" />
                                        <label class="form-check-label" for="payetype0">30% Paye Mode</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <br>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-text bg-info text-white">N.O.K</span>
                                <input type="text" class="form-control" name ="nok" id ="nok" placeholder="next of kin">                              
                                <small class="text-danger err" id="nok-err"></small>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-text bg-info text-white">Contact</span>
                                <input type="text" class="form-control" name ="nokcellphone" id ="nokcellphone" placeholder="cellphone">                              
                                <small class="text-danger err" id="nokcellphone-err"></small>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-text bg-info text-white">Relation</span>
                                <input type="text" class="form-control" name ="nokrelation" id ="nokrelation" placeholder="who is to you?">                              
                                <small class="text-danger err" id="nokrelation-err"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="container-fluid" style="border:1px solid #DBDDE0;">
                        <label for="container-fluid" class="text-primary">Contact Details</label>                        
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-text text-primary">Cellphone</span>
                                  <input type="text" class="form-control" name="cellphone" id="cellphone" placeholder="xxxx-xxx-xxx">
                                  <small class="text-danger err" id="cellphone-err"></small>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-text text-primary">Email</span>
                                  <input type="text" class="form-control" name="email" id="email" placeholder="name@example.com">
                                  <small class="text-danger err" id="email-err"></small>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-text text-primary">Address</span>
                                  <input type="text" class="form-control" name="pobox" id="pobox" placeholder="P.o. box">
                                  <small class="text-danger err" id="pobox-err"></small>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-text text-primary">Paymode</span>
                                  <select class="form-control" name="paymode" id="paymode">
                                    <option value="0" selected>Cash</option>
                                    <option value="1" >Bank Transfer</option>
                                  </select>
                                  <small class="text-danger err" id="paymode-err"></small>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-text text-primary">Bank</span>
                                  <select class="form-control" name="bank" id="bank">
                                    <option value="-1" selected>-select bank-</option>
                                    @foreach($banks as $bank)
                                    <option value="{{$bank->code}}">{{$bank->description}}</option>
                                    @endforeach
                                  </select>
                                  <small class="text-danger err" id="bank-err"></small>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-text text-primary">Branch</span>
                                  <input type="text" class="form-control" name="branch" id="branch">
                                  <small class="text-danger err" id="branch-err"></small>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-text text-primary">Acct No.</span>
                                  <input type="text" class="form-control" name="accountno" id="accountno">
                                  <small class="text-danger err" id="accountno-err"></small>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                    <!-- <div class="col-md-12"> -->
                        <!-- <label for="container-fluid" class ="text-bold text-primary" style="text-align: center;"><b>Incomes / Deductions Set up</b></label> -->
                      <div class="col-md-12">
                        <p class="input-group-text text-primary">Incomes / Deductions Set up</p>
                      </div>
                      <div class="col-md-6">
                        <div class="container-fluid" style="border:1px solid #DBDDE0;">
                          <div class="row">
                          <table style="width:100%;border-collapse:collapse !important" class="ui-incomes" id="ui-incomes">
                              <thead class="bg-primary text-white">
                                <th style="width: 10%!important;">#</th>  
                                <th>Income</th>  
                                <th style="text-align: right;">Amount </th>  
                                <th style="text-align: center;">Recurr </th>  
                                <th class="bg-danger text-white" style="text-align: center;">x</th>  
                              </thead>
                              
                              <tbody class="inc-details">
                                <tr class ="ui-rct-details" id="tr_1">
                                  <td style="width: 10%;"><input class="form-control iid" type="text" name="iid[]" id="iid_1" value="1" readonly></td>
                                  <td style="width: 40%;"><select class="form-control icode" name="icode[]" id="icode_1">
                                    <option value="-1" selected="selected">--Select Category--</option>
                                    @foreach($princdeds as $princded)
                                      @if($princded->itype)
                                      <option value="{{$princded->code}}">{{$princded->description}}</option>
                                      @endif
                                    @endforeach
                                    </select>
                                  </td>
                                  <td style="width: 30%;"><select class="form-control  iamt" name="iamt[]" id="iamt_1" style="display: none;">
                                    <option value="-1" selected="selected">--Select Category--</option>
                                    @foreach($princdeds as $princded)
                                      @if($princded->itype)
                                      <option value="{{$princded->damount}}">{{$princded->damount}}</option>
                                      @endif
                                    @endforeach
                                    </select>
                                    <input style ="text-align: right;" class="form-control iamount" type="text" name="iamount[]" id="iamount_1" value="0">
                                  </td>
                                  <td style="width: 20%;"><select class="form-control irecurr" name="irecurr[]" id="irecurr_1">
                                    <option value="1" selected="selected">Yes</option>
                                    <option value="0">No</option>
                                    </select>
                                  </td>
                                  <td style="padding:2px 4px;">
                                  <span class="btn btn-icon btn-danger glow  iclose_tr" id="iclose_1"><i class="ik ik-x ik-fw"></i></span>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-6">
                              <button class="btn btn-primary ui-add-row" type="button"><span class="fa fa-plus"></span>
                                  Add new Income</button>
                            </div>
                            <div class="col-md-6">
                                <div class="pull-right form-group {{ $errors->has('total') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-text bg-danger text-white">Incomes</span>
                                        <input type="text" name="total" id="total" class="text-right form-control"
                                            value="0.00" placeholder="" readonly />
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="container-fluid" style="border:1px solid #DBDDE0;">
                          <div class="row">
                          <table style="width:100%;border-collapse:collapse !important" class="ui-deductions" id="ui-deductions">
                              <thead class="bg-warning text-white">
                                <th style="width: 10%!important;">#</th>  
                                <th style="width: 40%!important;">Deductions</th>  
                                <th style="text-align: right;width: 20%">Amount </th>  
                                <th style="text-align: center;">Recurr </th>  
                                <th style="text-align: center;">Pension </th>  
                                <th class="bg-danger text-white" style="text-align: center;">-</th>  
                              </thead>
                              
                              <tbody class="ded-details">
                                <tr class="ui-rct-details" id ="tr_1">
                                  <td style="padding:0px;width: 10%;"><input class="form-control did" type="text" name="did[]" id="did_1" value="1" readonly></td>
                                  <td style="width:40%;"><select class="form-control dcode" name="dcode[]" id="dcode_1">
                                    <option value="-1" selected="selected">--Select Category--</option>
                                    @foreach($princdeds as $princded)
                                      @if($princded->itype)
                                      <option value="{{$princded->code}}">{{$princded->description}}</option>
                                      @endif
                                    @endforeach
                                    </select>
                                  </td>
                                  <td><select class="form-control  damt" name="damt[]" id="damt_1" style="display: none;">
                                    <option value="-1" selected="selected">--Select Category--</option>
                                    @foreach($princdeds as $princded)
                                      @if($princded->itype)
                                      <option value="{{$princded->damount}}">{{$princded->damount}}</option>
                                      @endif
                                    @endforeach
                                    </select>
                                    <input style ="text-align: right" class="form-control damount" type="text" name="damount[]" id="damount_1" value="0">
                                  </td>
                                  <td><select class="form-control drecurr" name="drecurr[]" id="drecurr_1">
                                    <option value="1" selected="selected">Yes</option>
                                    <option value="0">No</option>
                                    </select>
                                  </td>
                                  <td><select class="form-control dpen" name="dpen[]" id="dpen_1">
                                    <option value="0" selected="selected">No</option>
                                    <option value="1">Yes</option>
                                    </select>
                                  </td>
                                  <td style="padding:2px 4px;">
                                  <span class="btn btn-icon btn-danger glow  dclose_tr" id="dclose_1"><i class="ik ik-x ik-fw"></i></span>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-6">
                              <button class="btn btn-warning ud-add-row" type="button"><span class="fa fa-plus fa-fw"></span>
                                  Add new Deduction</button>
                            </div>
                            <div class="col-md-6">
                                <div class="pull-right form-group {{ $errors->has('total') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-text bg-danger text-white">Deductions</span>
                                        <input type="text" name="total" id="total" class="text-right form-control"
                                            value="0.00" placeholder="" readonly />
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <!-- </div> --> 
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="ik save ik-save"></i>Submit</button>
                        <!-- <a href="{{ route('admin.employee.index') }}" class="btn btn-light"><i class="ik arrow-left ik-arrow-left"></i> Go Back</a> -->
                      </div>
                    </div>
                  </div>
                    <!-- <div class="row">
                      <div class="col-md-6 col-lg-6 col-sm-12 hidden" id="show-avatar-div">
                        <div class="form-group my-auto">
                          <a href="#" class="text-danger float-right" data-remove="" id="remove-avatar-profile"><i class="ik ik-x-circle"></i></a>
                          <img src="{{ asset('admin_assets/avatars/merchant/thumb/male.png') }}" class="circle-temp" id="avatar-profile">
                        </div>
                      </div>
                    </div> -->
                </form>
            </div>
        
        </div>
    </div>
</div>

<!--Avatar model-->
<div class="modal" id="AvatarModel">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="img-container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12" id="avatar-preview">
              
            </div>
          </div>
        </div>
        <div class="mt-2">
          <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12">
              <button type="button" class="btn btn-block btn-outline-secondary" data-dismiss="modal"><i class="ik x-circle ik-x-circle"></i> Close</button>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12">
            <button type="submit" class="btn btn-primary btn-lg glow"
                                        style="font-size: 32px;font-weight: bold;"> <i
                                            class="ik ik-save"></i>Save Staff</button>
              
              <!-- <button type="button" class="btn btn-block btn-dark" id="crop-nd-save"><i class="ik ik-crop"></i> Crop & Save</button> -->
            </div>
          </div>
        </div>
      </div>
    
    </div>
  </div>
</div>

@endsection

@section('js')

<script type="text/javascript">

$(document).ready(function($) {
  
  $('#empdate,#dob').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    todayHighlight: true
  });
  
  $('.ui-add-row').click(function() {
        var _id = $('.icode').length + 1;
        addIncome(_id);
        _id + 1;
  });
  
  $('.ud-add-row').click(function() {
        var _id = $('.dcode').length + 1;
        addDeduction(_id);
        _id + 1;
  });
  
  function addIncome(vid) {
    var tblstr =
        '<tr class ="ui-rct-details" id="tr_'+ vid +'">'+
          '<td style="width: 10%;"><input class="form-control iid" type="text" name="iid[]" id="iid_'+ vid +'" value='+ vid +' readonly></td>'+
          '<td style="width: 40%;"><select class="form-control icode" name="icode[]" id="icode_'+ vid +'">'+
            '<option value="-1" selected="selected">--Select Category--</option>'+
            '@foreach($princdeds as $princded)'+
              '@if($princded->itype)'+
              '<option value="{{$princded->code}}">{{$princded->description}}</option>'+
              '@endif'+
            '@endforeach'+
            '</select>'+
          '</td>'+
          '<td style="width: 30%;"><select class="form-control  iamt" name="iamt[]" id="iamt_'+ vid +'" style="display: none;">'+
            '<option value="-1" selected="selected">--Select Category--</option>'+
            '@foreach($princdeds as $princded)'+
              '@if($princded->itype)'+
              '<option value="{{$princded->damount}}">{{$princded->damount}}</option>'+
              '@endif'+
            '@endforeach'+
            '</select>'+
            '<input style ="text-align: right;" class="form-control iamount" type="text" name="iamount[]" id="iamount_'+ vid +'" value="0">'+
          '</td>'+
          '<td style="width: 20%;"><select class="form-control irecurr" name="irecurr[]" id="irecurr_'+ vid +'">'+
            '<option value="1" selected="selected">Yes</option>'+
            '<option value="0">No</option>'+
            '</select>'+
          '</td>'+
          '<td style="padding:2px 4px;">'+
          '<span class="btn btn-icon btn-danger glow  iclose_tr" id="iclose_'+ vid +'"><i class="ik ik-x ik-fw"></i></span>'+
          '</td>'+
        '</tr>';
      
      $('.inc-details').append(tblstr);
    }
    
    function addDeduction(vid) {
    var tblstr =
        '<tr class="ui-rct-details" id="tr_'+ vid +'">'+
          '<td style="width: 10%;"><input class="form-control did" type="text" name="did[]" id="did_'+ vid +'" value='+ vid +' readonly></td>'+
          '<td style="width: 40%;"><select class="form-control dcode" name="dcode[]" id="dcode_'+ vid +'">'+
            '<option value="-1" selected="selected">--Select Category--</option>'+
            '@foreach($princdeds as $princded)'+
              '@if(!$princded->itype)'+
              '<option value="{{$princded->code}}">{{$princded->description}}</option>'+
              '@endif'+
            '@endforeach'+
            '</select>'+
          '</td>'+
          '<td><select class="form-control  damt" name="damt[]" id="damt_'+ vid +'" style="display: none;">'+
            '<option value="-1" selected="selected">--Select Category--</option>'+
            '@foreach($princdeds as $princded)'+
              '@if(!$princded->itype)'+
              '<option value="{{$princded->damount}}">{{$princded->damount}}</option>'+
              '@endif'+
            '@endforeach'+
            '</select>'+
            '<input style ="text-align: right;" class="form-control damount" type="text" name="damount[]" id="damount_'+ vid +'" value="0">'+
          '</td>'+
          '<td><select class="form-control drecurr" name="drecurr[]" id="drecurr_'+ vid +'">'+
            '<option value="1" selected="selected">Yes</option>'+
            '<option value="0">No</option>'+
            '</select>'+
          '</td>'+
          '<td><select class="form-control dpen" name="dpen[]" id="dpen_'+ vid +'">'+
            '<option value="1" selected="selected">Yes</option>'+
            '<option value="0">No</option>'+
            '</select>'+
          '</td>'+
          '<td style="padding:2px 4px;">'+
          '<span class="btn btn-icon btn-danger glow  dclose_tr" id="dclose_'+ vid +'"><i class="ik ik-x ik-fw"></i></span>'+
          '</td>'+
        '</tr>';
      
      $('.ded-details').append(tblstr);
    }
    
    $(document).on('click', '.iclose_tr', function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "Remove Selected Row!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
              var rid = $(this).attr('id').split('_')[1];
              removeIncome(rid);
            } else {
              Swal.fire('You Shied!');
            }
        })
    
    })
    
    
    function removeIncome(v_rid) {
        $('.inc-details #tr_' + v_rid).remove();
    }
    
    $(document).on('click', '.dclose_tr', function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "Remove Selected Row!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                  var rid = $(this).attr('id').split('_')[1];
                  removeDeduction(rid);
            } else {
                  Swal.fire('You Shied!');
            }
        })
    
    })
    
    
    function removeDeduction(v_rid) {
        $('.ded-details #tr_' + v_rid).remove();
    }
  
    $('form.form_employee').on('submit', function(submission) {
      submission.preventDefault();
      Swal.fire({
        title: 'Add Employee?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: `Yes`,
        denyButtonText: `Abort`,
      }).then((res) => {
        if(res.value){
          var form   = $(this),
		            url    = form.attr('action'),
		            submit = form.find('[type=submit]');
		            console.log(url);
		            
		            var data        = form.serialize(),
		               contentType  = 'application/x-www-form-urlencoded; charset=UTF-8';
		        // Request.
		        $.ajax({
		            type: "POST",
		            url: url,
		            data: data,
		            dataType: 'json',
		            cache: false,
		            contentType: contentType,
		            processData: false
		        
		        // Response.
		        }).always(function(response, status) {
		            
		            // Reset errors.
		            
		             // Check for errors.
		            if (response.status == 422) {
		                var errors = $.parseJSON(response.responseText);
		                
		                // Iterate through errors object.
		                $.each(errors, function(field, message) {
		                    console.error(field+': '+message);
		                    //handle arrays
		                    if(field.indexOf('.') != -1) {
		                        field = field.replace('.', '[');
		                        //handle multi dimensional array
		                        for (i = 1; i <= (field.match(/./g) || []).length; i++) {
		                            field = field.replace('.', '][');
		                        }
		                        field = field + "]";
		                    }
		                    var formGroup = $('[name='+field+']', form).closest('.form-group');
		                    formGroup.addClass('has-error').append('<p class="help-block">'+message+'</p>');
		                });
		                
		            // If successful, reload.
		            } else {
		              if(response.status==500){
		               $('.ui-alert').html(response.responseText);
		                    //$('.ui-alert').html("<span class='text-warning'><i class='fa fa-frown fa-fw'></i> Something went Wrong</span>");                   
		              }else{  
		                $('form.form_employee')[0].reset();
                    Swal.fire('Success',response.responseText,'info');
		            }
		                //location.reload();
		            }
		        });
        }else{
          Swal.fire('You Shied!');
        }
      });
    });

});
</script>
@endsection
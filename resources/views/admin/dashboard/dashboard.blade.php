@extends('admin.layout.app')

@section('title') Dashboard @endsection

@section('css')
<style type="text/css">

</style>
@endsection

@section('content')

<div class="page-header">
  <div class="row align-items-end">
   <div class="col-lg-8">
    <div class="page-header-title">
     <i class="ik ik-bar-chart bg-blue"></i>
     <div class="d-inline">
      <h5>Dashboard</h5>
      <span>This is dashboard of the PeSystem.</span>
    </div>
  </div>
</div>
<div class="col-lg-4">
  <nav class="breadcrumb-container" aria-label="breadcrumb">
   <ol class="breadcrumb">
    <li class="breadcrumb-item">
     <a href="../../index.html"><i class="ik ik-home"></i></a>
   </li>
   <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
 </ol>
</nav>
</div>
</div>
</div>

<div class="container-fluid">
  <div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-12 cursure-pointer">
      <a href="#">
        <div class="widget bg-primary">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Total Employees</h6>
                <h2>{{ $counts['employees'] }}</h2>
              </div>
              <div class="icon">
                <i class="ik ik-users"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>

@endsection

@section('js')
<script type="text/javascript">

</script>
@endsection
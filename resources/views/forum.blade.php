@extends('layouts.app')

@section('title')
    <title>Dashboard</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-home icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Dashboard
                    <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                    </div>
                </div>
            </div>  
        </div> 
    </div>
    <div class="row">
      <div class="col-md-12 mb-3">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item card">
                <div id="headingTwo" class="card-header">
                  <button data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="text-left m-0 p-0 btn btn-link btn-block">
                  <h5 class="m-0 p-0">Collapsible Group Item #1</h5>
                  </button>
                </div>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="card-body">
                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="card mb-4">
                        <div class="card-header">
                            <div class="media flex-wrap w-100 align-items-center">
                                <img style="width: 40px; height: auto;" src="assets/images/avatars/3.jpg"
                                    class="d-block ui-w-40 rounded-circle" alt="">
                                <div class="media-body ml-3">
                                    <a href="javascript:void(0)">Allie Rodriguez</a>
                                    <div class="text-muted small">3 days ago</div>
                                </div>
                                <div class="text-muted small ml-3">
                                    <div>Member since <strong>01/12/2017</strong></div>
                                    <div><strong>1,234</strong> posts</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>
                                Aliquam varius euismod lectus, vel consectetur nibh tincidunt vitae. In non dignissim est. Sed eu
                                ligula metus. Vivamus eget quam sit amet risus venenatis laoreet ut vel magna. Sed dui ligula,
                                tincidunt in nunc eu, rhoncus
                                iaculis nisi.
                            </p>
                            <p>
                                Sed et convallis odio, vel laoreet tellus. Vivamus a leo eu metus porta pulvinar. Pellentesque
                                tristique varius rutrum.
                            </p>
                            <p>
                                Praesent sed lacinia erat. Proin efficitur pulvinar ante ullamcorper finibus. Mauris feugiat sapien
                                quis porttitor lacinia. Curabitur finibus justo in elementum pellentesque. Morbi iaculis tortor vel
                                justo porta, quis
                                blandit velit bibendum. Donec eu leo dignissim, condimentum libero eu, dapibus odio. Etiam sodales
                                venenatis posuere. Etiam condimentum nec velit eu scelerisque. Donec cursus tellus est, at hendrerit
                                nulla commodo eu.
                                Praesent euismod pellentesque tempor.
                            </p>
                            <p>
                                Nulla mollis sem id tempus pharetra. Mauris finibus eros et leo ultricies volutpat. Nunc in lacus
                                nec ex posuere gravida. Mauris metus nulla, mollis at felis vitae, congue ullamcorper velit. In
                                vulputate dui sapien, in
                                placerat tellus pellentesque ac. Duis pretium ex felis, sed vulputate orci efficitur id. Vivamus nec
                                mauris ex. Nullam sed dolor id augue elementum ullamcorper. Donec sit amet consectetur erat.
                            </p>
                        </div>
                        <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                            <div class="px-4 pt-3">
                                <a href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle">
                                    <i class="ion ion-ios-heart text-danger fsize-3"></i>&nbsp;
                                    <span class="align-middle">48</span>
                                </a>
                                <span class="text-muted d-inline-flex align-items-center align-middle ml-4">
                                    <i class="ion ion-ios-eye text-muted fsize-3"></i>&nbsp;
                                    <span class="align-middle">1,203</span>
                                </span>
                            </div>
                            <div class="px-4 pt-3">
                                <button type="button" class="btn btn-primary">
                                    <i class="ion ion-md-create"></i>&nbsp; Reply
                                </button>
                            </div>
                        </div>
                    </div>
            
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="media">
                                <img style="width: 40px; height: auto;" src="assets/images/avatars/5.jpg" alt=""
                                    class="d-block ui-w-40 rounded-circle">
                                <div class="media-body ml-4">
                                    <div class="float-right text-muted small">22 May</div>
                                    <a href="javascript:void(0)">Nellie Maxwell</a>
                                    <div class="text-muted small">Member since 01/12/2017 &nbsp;·&nbsp; 345 posts</div>
                                    <div class="mt-2">
                                        Nulla mollis sem id tempus pharetra. Mauris finibus eros et leo ultricies volutpat. Nunc in
                                        lacus nec ex posuere gravida. Mauris metus nulla, mollis at felis vitae, congue ullamcorper
                                        velit. In vulputate dui
                                        sapien, in placerat tellus pellentesque ac. Duis pretium ex felis, sed vulputate orci
                                        efficitur id. Vivamus nec mauris ex. Nullam sed dolor id augue elementum ullamcorper. Donec
                                        sit amet consectetur erat.
                                    </div>
                                    <div class="small mt-2">
                                        <a href="javascript:void(0)" class="text-muted">Reply</a>
                                        <a href="javascript:void(0)" class="text-muted ml-3">
                                            <i class="lnr-thumbs-up"></i> 15
                                        </a>
                                        <a href="javascript:void(0)" class="text-muted ml-3">
                                            <i class="lnr-thumbs-down"></i> 3
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
    
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
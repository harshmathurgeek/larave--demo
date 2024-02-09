@extends('auth.layouts')
@section('content')
    <section style="background-color: #ad655f;">
        <div class="container ">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10 mt-5">
                    <div class="card text-dark">
                        <div class="card-body p-4">
                            <h4 class="mb-0">Recent comments</h4>
                            <p class="fw-light mb-4 pb-2">Latest Comments section by users</p>

                            <div class="d-flex flex-start">
                                <img class="rounded-circle shadow-1-strong me-3"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(23).webp" alt="avatar"
                                    width="60" height="60" />
                                <div>
                                    <h6 class="fw-bold mb-1">Maggie Marsh</h6>
                                    <div class="d-flex align-items-center mb-3">
                                        <p class="mb-0">
                                            March 07, 2021
                                            <span class="badge bg-primary">Pending</span>
                                        </p>
                                        <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                                        <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                                        <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
                                    </div>
                                    <p class="mb-0">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry. Lorem Ipsum has been the industry's standard dummy text ever
                                        since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <hr class="my-0" />

                        <div class="card-body p-4">
                            <div class="d-flex flex-start">
                                <img class="rounded-circle shadow-1-strong me-3"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(26).webp" alt="avatar"
                                    width="60" height="60" />
                                <div>
                                    <h6 class="fw-bold mb-1">Lara Stewart</h6>
                                    <div class="d-flex align-items-center mb-3">
                                        <p class="mb-0">
                                            March 15, 2021
                                            <span class="badge bg-success">Approved</span>
                                        </p>
                                        <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                                        <a href="#!" class="text-success"><i class="fas fa-redo-alt ms-2"></i></a>
                                        <a href="#!" class="link-danger"><i class="fas fa-heart ms-2"></i></a>
                                    </div>
                                    <p class="mb-0">
                                        Contrary to popular belief, Lorem Ipsum is not simply random text. It
                                        has roots in a piece of classical Latin literature from 45 BC, making it
                                        over 2000 years old. Richard McClintock, a Latin professor at
                                        Hampden-Sydney College in Virginia, looked up one of the more obscure
                                        Latin words, consectetur, from a Lorem Ipsum passage, and going through
                                        the cites.
                                    </p>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
        <div class="container  py-5 text-dark">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="d-flex flex-start w-100">
                                <img class="rounded-circle shadow-1-strong me-3"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(21).webp" alt="avatar"
                                    width="65" height="65" />
                                <div class="w-100">
                                    <h5>Add a comment</h5>

                                    <div class="form-outline">
                                        <textarea class="form-control" id="textAreaExample" placeholder="What is your view" rows="4"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="button" class="btn btn-success">
                                            Send <i class="fas fa-long-arrow-alt-right ms-1"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="background-color: #d94125;">
        <div class="container my-5 py-5 text-dark">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="d-flex flex-start w-100">
                                <img class="rounded-circle shadow-1-strong me-3"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(21).webp" alt="avatar"
                                    width="65" height="65" />
                                <div class="w-100">
                                    <h5>Add a comment</h5>

                                    <div class="form-outline">
                                        <textarea class="form-control" id="textAreaExample" rows="4"></textarea>
                                        <label class="form-label" for="textAreaExample">What is your view?</label>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <button type="button" class="btn btn-success">Danger</button>
                                        <button type="button" class="btn btn-danger">
                                            Send <i class="fas fa-long-arrow-alt-right ms-1"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

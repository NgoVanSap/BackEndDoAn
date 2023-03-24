@extends('Admin.master')
@section('content')
<div class="layout-content">

    <!-- [ content ] Start -->
    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Người dùng</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item active">Thêm người dùng</li>
            </ol>
        </div>
        <div class="card mb-4">
            <h6 class="card-header">Thêm người dùng</h6>
            <div class="card-body">
                <form action="{{ route('add-User') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Email</label>
                            <input name="email" type="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                            <div class="clearfix"></div>
                            @error('email')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Họ Tên</label>
                            <input name="hoTen" value="{{ old('hoTen') }}" type="text" class="form-control" placeholder="Họ tên">
                            <div class="clearfix"></div>
                            @error('hoTen')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label class="form-label">Số điện thoại</label>
                            <input name="soDienThoai"  value="{{ old('soDienThoai') }}" type="number" class="form-control" placeholder="Số điện thoại">
                            <div class="clearfix"></div>
                            @error('soDienThoai')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Ngày sinh</label>
                            <input name="ngaySinh" value="{{ old('ngaySinh') }}" type="date" class="form-control" placeholder="Ngày sinh">
                            <div class="clearfix"></div>
                            @error('ngaySinh')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Địa chỉ</label>
                            <input name="diaChi" value="{{ old('diaChi') }}" type="text" class="form-control" placeholder="Địa chỉ">
                            <div class="clearfix"></div>
                            @error('diaChi')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Password</label>
                            <input name="password" value="{{ old('password') }}" type="password" class="form-control" placeholder="Password">
                            <div class="clearfix"></div>
                            @error('password')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-label">Phân quyền</label>
                            <select name="phanQuyen" class="custom-select">
                                <option value="3">Admin</option>
                                <option value="2">Giảng viên</option>
                                <option value="1">Nhân viên</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label w-100">Avatar</label>
                            <input name="avatar" value="{{ old('avatar') }}" type="file">
                            <div class="clearfix"></div>
                            @error('avatar')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                         {{-- <input type="file" name="avatar">
                         @if ($errors->has('avatar'))
                         <span class="invalid-feedback">
                             <strong>{{ $errors->first('avatar') }}</strong>
                         </span>
                     @endif
                     @if (old('avatar'))
                         <p>Previous avatar:</p>
                         <img src="{{ old('avatar') }}">
                     @endif --}}
                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label">Giới tính</label>
                            <div class="fixx" style="display:flex" >
                                <label class="custom-control custom-checkbox px-2 m-0">
                                    <input type="radio" name="gioiTinh" value="Nam" class="custom-control-input" checked>
                                    <span style=" margin-left: 16px; "class="custom-control-label">Nam</span>
                                </label>
                                <label class="custom-control custom-checkbox px-2 m-0">
                                    <input type="radio" name="gioiTinh" value="Nữ" class="custom-control-input">
                                    <span style=" margin-left: 16px; "class="custom-control-label">Nữ</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Trạng thái</label>
                            <div class="fixx" style="display:flex" >
                                <label class="custom-control custom-checkbox px-2 m-0">
                                    <input type="radio" name="trangThai" value="0" class="custom-control-input" checked>
                                    <span style=" margin-left: 16px; "class="custom-control-label">Bật</span>
                                </label>
                                <label class="custom-control custom-checkbox px-2 m-0">
                                    <input type="radio" name="trangThai" value="1" class="custom-control-input">
                                    <span style=" margin-left: 16px; "class="custom-control-label">Tắt</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng kí</button>
                </form>
            </div>
        </div>

        <div class="card mb-4">
            <h6 class="card-header">Horizontal</h6>
            <div class="card-body">
                <form>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" placeholder="Email">
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" placeholder="Password">
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Textarea</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" placeholder="Textarea"></textarea>
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <label class="col-form-label col-sm-2 text-sm-right pt-sm-0">Radios</label>
                            <div class="col-sm-10">
                                <div class="custom-controls-stacked">
                                    <label class="custom-control custom-radio">
                                        <input name="custom-radio-3" type="radio" class="custom-control-input" checked="">
                                        <span class="custom-control-label">Option one is this and that—be sure to include why it's great</span>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input name="custom-radio-3" type="radio" class="custom-control-input">
                                        <span class="custom-control-label">Option two can be something else and selecting it will deselect option one</span>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input name="custom-radio-3" type="radio" class="custom-control-input" disabled="">
                                        <span class="custom-control-label">Option three is disabled</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right pt-sm-0">Checkbox</label>
                        <div class="col-sm-10">
                            <label class="custom-control custom-checkbox m-0">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-label">Check me out</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mb-4">
            <h6 class="card-header">Inline</h6>
            <div class="card-body">
                <form class="form-inline mb-4">
                    <label class="sr-only">Name</label>
                    <input type="text" class="form-control mr-sm-2 mb-2 mb-sm-0" placeholder="Jane Doe">

                    <label class="sr-only">Username</label>
                    <div class="input-group mr-sm-2 mb-2 mb-sm-0">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input type="text" class="form-control" placeholder="Username">
                        <div class="clearfix"></div>
                    </div>
                    <label class="form-check mr-sm-2 mb-2 mb-sm-0">
                        <input class="form-check-input" type="checkbox">
                        <span class="form-check-label">Remember me</span>
                    </label>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <form class="form-inline">
                    <label class="form-label mr-sm-2">Preference</label>
                    <select class="custom-select mr-sm-2 mb-2 mb-sm-0">
                        <option selected="">Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label class="custom-control custom-checkbox mr-sm-2 mb-2 mb-sm-0">
                        <input type="checkbox" class="custom-control-input">
                        <span class="custom-control-label">Remember my preference</span>
                    </label>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="card mb-4">
            <h6 class="card-header">Help text</h6>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control">
                        <small class="form-text text-muted">Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.</small>
                    </div>
                </form>

                <form class="form-inline mt-4">
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control mx-sm-3">
                        <small class="text-muted">Must be 8-20 characters long.</small>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mb-4">
            <h6 class="card-header">Static controls</h6>
            <div class="card-body">
                <form>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Email</label>
                        <div class="col-sm-10">
                            <div class="form-control-plaintext">example.email.com</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" placeholder="Password">
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                            <button type="submit" class="btn btn-primary">Confirm identity</button>
                        </div>
                    </div>
                </form>

                <!-- Inline form -->
                <form class="form-inline mt-4">
                    <div class="form-control-plaintext mr-sm-2 mb-2 mb-sm-0">example.email.com</div>
                    <input type="password" class="form-control mr-sm-2 mb-2 mb-sm-0" placeholder="Password">
                    <button type="submit" class="btn btn-primary">Confirm identity</button>
                </form>
            </div>
        </div>

        <div class="card mb-4">
            <h6 class="card-header">States</h6>
            <div class="card-body">
                <!-- Valid -->
                <div class="form-group">
                    <label class="form-label">Valid</label>
                    <input type="text" class="form-control is-valid">
                    <small class="valid-feedback">A block of help text that breaks onto a new line and may extend beyond one line.</small>
                </div>

                <!-- Invalid -->
                <div class="form-group">
                    <label class="form-label">Invalid</label>
                    <input type="text" class="form-control is-invalid">
                    <small class="invalid-feedback">A block of help text that breaks onto a new line and may extend beyond one line.</small>
                </div>

                <!-- With tooltip -->
                <div class="form-group position-relative">
                    <label class="form-label">Invalid with tooltip</label>
                    <input type="text" class="form-control is-invalid">
                    <div class="invalid-tooltip">Please provide a valid state.</div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <h6 class="card-header">Sizes</h6>
            <div class="card-body">
                <form>
                    <!-- Large -->
                    <div class="form-group">
                        <label class="form-label form-label-lg">Large label</label>
                        <input type="text" class="form-control form-control-lg" placeholder="Large input">
                        <div class="clearfix"></div>
                    </div>

                    <!-- Small -->
                    <div class="form-group">
                        <label class="form-label form-label-sm">Small label</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Small input">
                        <div class="clearfix"></div>
                    </div>
                </form>

                <form class="mt-4">
                    <!-- Large -->
                    <div class="form-group row">
                        <label class="col-form-label col-form-label-lg col-sm-2 text-sm-right">Large label</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-lg" placeholder="Large input">
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <!-- Small -->
                    <div class="form-group row">
                        <label class="col-form-label col-form-label-sm col-sm-2 text-sm-right">Small label</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" placeholder="Small input">
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- [ content ] End -->

    <!-- [ Layout footer ] Start -->
    <nav class="layout-footer footer bg-white">
        <div class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">
            <div class="pt-3">
                <span class="footer-text font-weight-semibold">© <a href="https://srthemesvilla.com" class="footer-link" target="_blank">Srthemesvilla</a></span>
            </div>
            <div>
                <a href="javascript:" class="footer-link pt-3">About Us</a>
                <a href="javascript:" class="footer-link pt-3 ml-4">Help</a>
                <a href="javascript:" class="footer-link pt-3 ml-4">Contact</a>
                <a href="javascript:" class="footer-link pt-3 ml-4">Terms &amp; Conditions</a>
            </div>
        </div>
    </nav>
    <!-- [ Layout footer ] End -->

</div>

@endsection

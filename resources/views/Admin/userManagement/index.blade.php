@extends('Admin.master')
@section('content')
    <div class="layout-content">
        <div class="container-fluid flex-grow-1 container-p-y">
            <div class="row">
                <!-- 3rd row Start -->
                <div class="col-xl-5">
                    <div class="card mb-4">
                        <div class="card-header with-elements">
                            <h6 class="card-header-title mb-0">Tasks</h6>
                            <div class="card-header-elements ml-auto">
                                <button type="button" class="btn btn-default btn-xs md-btn-flat">Show more</button>
                            </div>
                        </div>
                        <div style="height: 310px" id="tasks-inner" class="ps ps--active-y">
                            <div class="card-body">
                                <p class="text-muted small">Today</p>
                                <div class="custom-controls-stacked">
                                    <label class="ui-todo-item custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label">Buy products</span>
                                        <span class="ui-todo-badge badge badge-outline-default font-weight-normal ml-2">58 mins left</span>
                                    </label>
                                    <label class="ui-todo-item custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label">Reply to emails</span>
                                    </label>
                                    <label class="ui-todo-item custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label">Write blog post</span>
                                        <span class="ui-todo-badge badge badge-outline-default font-weight-normal ml-2">20 hours left</span>
                                    </label>
                                    <label class="ui-todo-item custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" checked="">
                                        <span class="custom-control-label">Wash my car</span>
                                    </label>
                                </div>
                            </div>
                            <hr class="m-0">
                            <div class="card-body">
                                <p class="text-muted small">Tomorrow</p>
                                <div class="custom-controls-stacked">
                                    <label class="ui-todo-item custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label">Buy antivirus</span>
                                    </label>
                                    <label class="ui-todo-item custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label">Jane's Happy Birthday</span>
                                    </label>
                                    <label class="ui-todo-item custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label">Call mom</span>
                                    </label>
                                </div>
                            </div>
                        <div class="ps__rail-x" style="left: 0px; bottom: -57px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 57px; height: 310px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 48px; height: 261px;"></div></div></div>
                        <div class="card-footer">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Type your task">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="card mb-4">
                        <div class="card-header with-elements pb-0">
                            <h6 class="card-header-title mb-0">Customer details</h6>
                            <div class="card-header-elements ml-auto p-0">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link show active" data-toggle="tab" href="#sale-stats">Sale stats</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link show" data-toggle="tab" href="#latest-sales">Latest sales</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="nav-tabs-top">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="sale-stats">
                                    <div style="height: 330px" id="tab-table-1" class="ps ps--active-x ps--active-y">
                                        <table class="table table-hover card-table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <label class="custom-control custom-checkbox mb-0">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <span class="custom-control-label"><strong>Due</strong></span>
                                                        </label>
                                                    </th>
                                                    <th>User</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label class="custom-control custom-checkbox mb-0">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <span class="custom-control-label"><strong>12</strong><br><span>hour</span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="media mb-0">
                                                            <img src="assets/img/avatars/3-small.png" class="d-block ui-w-40 rounded-circle" alt="">
                                                            <div class="media-body align-self-center ml-3">
                                                                <h6 class="mb-0">John Deo</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <h6 class="mb-1">[#1183] Workaround for OS X selects printing bug</h6>
                                                            <p class="text-muted mb-0">Chrome fixed the bug several versions ago, thus rendering this...</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="custom-control custom-checkbox mb-0">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <span class="custom-control-label"><strong>16</strong><br><span>hour</span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="media mb-0">
                                                            <img src="assets/img/avatars/1-small.png" class="d-block ui-w-40 rounded-circle" alt="">
                                                            <div class="media-body align-self-center ml-3">
                                                                <h6 class="mb-0">Jems Win</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <h6 class="mb-1">[#1249] Vertically center carousel controls</h6>
                                                            <p class="text-muted mb-0">Try any carousel control and reduce the screen width below...</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="custom-control custom-checkbox mb-0">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <span class="custom-control-label"><strong>40</strong><br><span>hour</span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="media mb-0">
                                                            <img src="assets/img/avatars/1-small.png" class="d-block ui-w-40 rounded-circle" alt="">
                                                            <div class="media-body align-self-center ml-3">
                                                                <h6 class="mb-0">Jems Wiliiam</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <h6 class="mb-1">[#1254] Inaccurate small pagination height</h6>
                                                            <p class="text-muted mb-0">The height of pagination elements is not consistent with...</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="custom-control custom-checkbox mb-0">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <span class="custom-control-label"><strong>12</strong><br><span>hour</span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="media mb-0">
                                                            <img src="assets/img/avatars/3-small.png" class="d-block ui-w-40 rounded-circle" alt="">
                                                            <div class="media-body align-self-center ml-3">
                                                                <h6 class="mb-0">John Deo</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <h6 class="mb-1">[#1183] Workaround for OS X selects printing bug</h6>
                                                            <p class="text-muted mb-0">Chrome fixed the bug several versions ago, thus rendering this...</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="custom-control custom-checkbox mb-0">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <span class="custom-control-label"><strong>12</strong><br><span>hour</span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="media mb-0">
                                                            <img src="assets/img/avatars/3-small.png" class="d-block ui-w-40 rounded-circle" alt="">
                                                            <div class="media-body align-self-center ml-3">
                                                                <h6 class="mb-0">John Deo</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <h6 class="mb-1">[#1183] Workaround for OS X selects printing bug</h6>
                                                            <p class="text-muted mb-0">Chrome fixed the bug several versions ago, thus rendering this...</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="custom-control custom-checkbox mb-0">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <span class="custom-control-label"><strong>16</strong><br><span>hour</span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="media mb-0">
                                                            <img src="assets/img/avatars/1-small.png" class="d-block ui-w-40 rounded-circle" alt="">
                                                            <div class="media-body align-self-center ml-3">
                                                                <h6 class="mb-0">Jems Win</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <h6 class="mb-1">[#1249] Vertically center carousel controls</h6>
                                                            <p class="text-muted mb-0">Try any carousel control and reduce the screen width below...</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="custom-control custom-checkbox mb-0">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <span class="custom-control-label"><strong>40</strong><br><span>hour</span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="media mb-0">
                                                            <img src="assets/img/avatars/1-small.png" class="d-block ui-w-40 rounded-circle" alt="">
                                                            <div class="media-body align-self-center ml-3">
                                                                <h6 class="mb-0">Jems Wiliiam</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <h6 class="mb-1">[#1254] Inaccurate small pagination height</h6>
                                                            <p class="text-muted mb-0">The height of pagination elements is not consistent with...</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="custom-control custom-checkbox mb-0">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <span class="custom-control-label"><strong>12</strong><br><span>hour</span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="media mb-0">
                                                            <img src="assets/img/avatars/3-small.png" class="d-block ui-w-40 rounded-circle" alt="">
                                                            <div class="media-body align-self-center ml-3">
                                                                <h6 class="mb-0">John Deo</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <h6 class="mb-1">[#1183] Workaround for OS X selects printing bug</h6>
                                                            <p class="text-muted mb-0">Chrome fixed the bug several versions ago, thus rendering this...</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <div class="ps__rail-x" style="width: 624px; left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 550px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 330px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 200px;"></div></div></div>
                                    <a href="javascript:" class="card-footer d-block text-center text-dark small font-weight-semibold">SHOW MORE</a>
                                </div>
                                <div class="tab-pane fade" id="latest-sales">
                                    <div style="height: 330px" id="tab-table-2" class="ps">
                                        <table class="table table-hover card-table">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Qty.</th>
                                                    <th>Sum.</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle">
                                                        <a href="javascript:" class="text-dark">PlayStation 4 1TB (Jet Black)</a>
                                                    </td>
                                                    <td class="align-middle">1</td>
                                                    <td class="align-middle">$480.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">
                                                        <a href="javascript:" class="text-dark">Nike Men Black Liteforce III Sneakers</a>
                                                    </td>
                                                    <td class="align-middle">2</td>
                                                    <td class="align-middle">$115.1</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">
                                                        <a href="javascript:" class="text-dark">Wireless headphones</a>
                                                    </td>
                                                    <td class="align-middle">1</td>
                                                    <td class="align-middle">$235.55</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">
                                                        <a href="javascript:" class="text-dark">HERO ATHLETES BAG</a>
                                                    </td>
                                                    <td class="align-middle">1</td>
                                                    <td class="align-middle">$160.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">
                                                        <a href="javascript:" class="text-dark">POÄNG</a>
                                                    </td>
                                                    <td class="align-middle">3</td>
                                                    <td class="align-middle">$477.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">
                                                        <a href="javascript:" class="text-dark">Apple iWatch (black)</a>
                                                    </td>
                                                    <td class="align-middle">1</td>
                                                    <td class="align-middle">$399.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">
                                                        <a href="javascript:" class="text-dark">WALKING 400 BLUE CAT3</a>
                                                    </td>
                                                    <td class="align-middle">2</td>
                                                    <td class="align-middle">$41.1</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">
                                                        <a href="javascript:" class="text-dark">Wireless headphones</a>
                                                    </td>
                                                    <td class="align-middle">1</td>
                                                    <td class="align-middle">$235.55</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">
                                                        <a href="javascript:" class="text-dark">HERO ATHLETES BAG</a>
                                                    </td>
                                                    <td class="align-middle">1</td>
                                                    <td class="align-middle">$160.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">
                                                        <a href="javascript:" class="text-dark">POÄNG</a>
                                                    </td>
                                                    <td class="align-middle">3</td>
                                                    <td class="align-middle">$477.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                                    <a href="javascript:" class="card-footer d-block text-center text-dark small font-weight-semibold">SHOW MORE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 3rd row Start -->
            </div>
        </div>
    </div>
@endsection

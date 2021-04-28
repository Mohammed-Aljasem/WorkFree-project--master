@extends('admin.layout.header')
@section('main')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Users</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-right mb-3">
                        <a href="https://black-dashboard-pro-laravel.creative-tim.com/user/create"
                            class="btn btn-sm btn-primary">Add user</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <div id="datatables_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="datatables_length"><label>Show <select
                                            name="datatables_length" aria-controls="datatables"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="-1">All</option>
                                        </select> entries</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="datatables_filter" class="dataTables_filter"><label><input type="search"
                                            class="form-control form-control-sm" placeholder="Search users"
                                            aria-controls="datatables"></label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatables"
                                    class="table table-striped table-no-bordered table-hover dataTable no-footer dtr-inline collapsed"
                                    style="width: 1167px;" role="grid" aria-describedby="datatables_info">
                                    <thead class="text-primary">
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1"
                                                colspan="1" style="width: 182px;" aria-sort="ascending" aria-label="
                      Photo
                  : activate to sort column descending">
                                                Photo
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1"
                                                colspan="1" style="width: 102px;" aria-label="
                      Name
                  : activate to sort column ascending">
                                                Name
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1"
                                                colspan="1" style="width: 255px;" aria-label="
                    Email
                  : activate to sort column ascending">
                                                Email
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1"
                                                colspan="1" style="width: 93px;" aria-label="
                    Role
                  : activate to sort column ascending">
                                                Role
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1"
                                                colspan="1" style="width: 218px;" aria-label="
                    Creation date
                  : activate to sort column ascending">
                                                Creation date
                                            </th>
                                            <th class="text-right sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 118px; display: none;" aria-label="
                      Actions
                    ">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>



                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1">
                                                <div class="avatar avatar-sm rounded-circle img-circle"
                                                    style="width:100px; height:100px;overflow: hidden;">
                                                    <img src="/storage/../black/img/jana.jpg" alt=""
                                                        style="max-width: 100px;">
                                                </div>
                                            </td>
                                            <td style="">
                                                Admin
                                            </td>
                                            <td style="">
                                                admin@black.com
                                            </td>
                                            <td style="">
                                                Admin
                                            </td>
                                            <td style="">
                                                2021-03-28
                                            </td>
                                            <td class="td-actions text-right" style="display: none;">
                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td tabindex="0" class="sorting_1">
                                                <div class="avatar avatar-sm rounded-circle img-circle"
                                                    style="width:100px; height:100px;overflow: hidden;">
                                                    <img src="/storage/../black/img/lora.jpg" alt=""
                                                        style="max-width: 100px;">
                                                </div>
                                            </td>
                                            <td style="">
                                                Creator
                                            </td>
                                            <td style="">
                                                creator@black.com
                                            </td>
                                            <td style="">
                                                Creator
                                            </td>
                                            <td style="">
                                                2021-03-28
                                            </td>
                                            <td class="td-actions text-right" style="display: none;">
                                                <form action="https://black-dashboard-pro-laravel.creative-tim.com/user/2"
                                                    method="post">
                                                    <input type="hidden" name="_token"
                                                        value="0MEn21sUKhQegYmDCyzF8koQHJaCLlkMP2ls35T2"> <input
                                                        type="hidden" name="_method" value="delete">
                                                </form>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1">
                                                <div class="avatar avatar-sm rounded-circle img-circle"
                                                    style="width:100px; height:100px;overflow: hidden;">
                                                    <img src="/storage/../black/img/mike.jpg" alt=""
                                                        style="max-width: 100px;">
                                                </div>
                                            </td>
                                            <td style="">
                                                Member
                                            </td>
                                            <td style="">
                                                member@black.com
                                            </td>
                                            <td style="">
                                                Member
                                            </td>
                                            <td style="">
                                                2021-03-28
                                            </td>
                                            <td class="td-actions text-right" style="display: none;">
                                                <form action="https://black-dashboard-pro-laravel.creative-tim.com/user/3"
                                                    method="post">
                                                    <input type="hidden" name="_token"
                                                        value="0MEn21sUKhQegYmDCyzF8koQHJaCLlkMP2ls35T2"> <input
                                                        type="hidden" name="_method" value="delete">
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="datatables_info" role="status" aria-live="polite">Showing 1
                                    to 3 of 3 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_full_numbers" id="datatables_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item first disabled" id="datatables_first"><a
                                                href="#" aria-controls="datatables" data-dt-idx="0" tabindex="0"
                                                class="page-link">First</a></li>
                                        <li class="paginate_button page-item previous disabled" id="datatables_previous"><a
                                                href="#" aria-controls="datatables" data-dt-idx="1" tabindex="0"
                                                class="page-link">Previous</a></li>
                                        <li class="paginate_button page-item active"><a href="#" aria-controls="datatables"
                                                data-dt-idx="2" tabindex="0" class="page-link">1</a></li>
                                        <li class="paginate_button page-item next disabled" id="datatables_next"><a href="#"
                                                aria-controls="datatables" data-dt-idx="3" tabindex="0"
                                                class="page-link">Next</a></li>
                                        <li class="paginate_button page-item last disabled" id="datatables_last"><a href="#"
                                                aria-controls="datatables" data-dt-idx="4" tabindex="0"
                                                class="page-link">Last</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

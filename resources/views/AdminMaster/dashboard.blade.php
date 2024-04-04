
@extends('AdminMaster.layouts.app')
@section('content')
<div>
    <h4 class="mb-1">Hello, Carolyn Perkins!</h4>
    <p>You have 5 tasks on hand.</p>
</div>
<div class="flex flex-col xl:flex-row gap-4">
    <div class="flex flex-col gap-4 flex-auto">

        <div class="card card-layout-frame">
            <div class="card-body">
                <div class="flex items-center justify-between mb-6">
                    <h4>My Tasks</h4>
                    <button class="btn btn-default btn-sm">View all</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="table-default table-hover">
                        <thead>
                            <tr>
                                <th colspan="1">Task ID</th>
                                <th colspan="1">Subject</th>
                                <th colspan="1">Priority</th>
                                <th colspan="1">Assignees</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a class="hover:underline font-semibold" href="#">KCM-1393</a>
                                </td>
                                <td>Design sign up flow</td>
                                <td>
                                    <div class="tag text-red-600 bg-red-100 dark:text-red-100 dark:bg-red-500/20 rounded border-0">
                                        High
                                    </div>
                                </td>
                                <td>
                                    <div class="avatar-group avatar-group-chained">
                                        <span class="avatar avatar-circle avatar-sm" data-avatar-size="30" data-bs-toggle="tooltip" data-bs-title="Carolyn Perkins">
                                            <img class="avatar-img avatar-circle" src="{{asset('assets/img/avatars/thumb-1.jpg')}}" loading="lazy">
                                        </span>
                                        <span class="avatar avatar-circle avatar-sm" data-avatar-size="30" data-bs-toggle="tooltip" data-bs-title="Terrance Moreno">
                                            <img class="avatar-img avatar-circle" src="{{asset('assets/img/avatars/thumb-2.jpg')}}" loading="lazy">
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><a class="hover:underline font-semibold" href="#">KCM-2039</a></td>
                                <td>Update contact page</td>
                                <td>
                                    <div class="tag text-amber-600 bg-amber-100 dark:text-amber-100 dark:bg-amber-500/20 rounded border-0">
                                        Medium
                                    </div>
                                </td>
                                <td>
                                    <div class="avatar-group avatar-group-chained">
                                        <span class="avatar avatar-circle avatar-sm" data-avatar-size="30" data-bs-toggle="tooltip" data-bs-title="Carolyn Perkins">
                                            <img class="avatar-img avatar-circle" src="{{asset('assets/img/avatars/thumb-2.jpg')}}" loading="lazy">
                                        </span>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="flex flex-col gap-4">
        <div class="xl:w-[380px]">
            <div class="card card-layout-frame mb-4">
                <div class="card-body">
                    <div class="project-calendar" inline-datepicker data-date=""></div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection


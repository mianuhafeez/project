@extends('layouts.app')
@section('content')
    <div class="section-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <ul class="nav nav-tabs page-header-tab">
                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#todo-list">
                            ToDo List</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#todo-add">Add Todo</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="section-body mt-3">
        <div class="container-fluid">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="todo-list" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <tasks-list></tasks-list>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="todo-add" role="tabpanel">
                    <section class="signup">
                        <div class="container">
                            <div class="signup-content">
                                <div class="signup-form">
                                    <task-form></task-form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

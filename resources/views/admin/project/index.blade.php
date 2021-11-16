@extends('layouts.admin')
@section('title', 'Gestión de proyectos')
@section('styles')
    <style type="text/css">
        .unstyled-button {
            border: none;
            padding: 0;
            background: none;
        }

    </style>
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css') !!}

@endsection
@section('create')

@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Proyectos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Proyectos</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3 mr-2">
                            <h5> Lista de Proyectos</h5>
                            <a class="nav-link" href="{{ route('projects.create') }}">
                                <span class="btn btn-success btn-sm "> <i class="fas fa-check"></i> Nuevo Proyecto</span>
                            </a>

                        </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th hidden>Id</th>
                                        <th>Nombre de Proyecto</th>
                                        <th>Estado</th>
                                        <th>Fecha / Hora</th>
                                        <th>Acciones</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <th scope="row" hidden>
                                                <a href="{{ route('projects.show', $project) }}">{{ $project->id }}</a>
                                            </th>
                                            <td><a
                                                    href="{{ route('projects.show', $project) }}">{{ $project->name }}</a>
                                            </td>
                                            @if ($project->status == 'VALID')
                                                <td>
                                                    <a class=" btn btn-success" href="" title="Editar">
                                                        Concluido
                                                    </a>
                                                </td>
                                            @else
                                                <td>
                                                    <a style="height:26px; width:105px" class="jsgrid-button btn btn-danger"
                                                        href="" title="Editar">
                                                        En curso
                                                    </a>
                                                </td>
                                            @endif
                                            <td>
                                                {{ \Carbon\Carbon::parse($project->sale_date)->format('d M y h:i a') }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('projects.pdf', $project) }}"
                                                    class="jsgrid-button jsgrid-edit-button"><i
                                                        class="far fa-file-pdf"></i></a>
                                                <a href="#exampleModal-2" type="button" data-toggle="modal"
                                                    data-id="{{ $project->id }}" data-target="#exampleModal-2"><i
                                                        class="fas fa-camera-retro"></i>
                                                </a>


                                            </td>


                                            {{-- <td style="width: 50px;">

                                        <a href="{{route('projects.pdf', $project)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                        <a href="{{route('projects.print', $project)}}" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-print"></i></a>
                                        <a href="{{route('projects.show', $project)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
                                   
                                      
                                    </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="card-footer text-muted">
                    {{$projects->render()}}
                </div> --}}


                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-2">Subir imagenes de proyecto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>



                    <div class="modal-body container-fluid">

                        {!! Form::open(['route' => 'files.store', 'method' => 'POST', 'files' => true, 'class' => 'dropzone', 'container', 'id' => 'my-awesome-dropzone']) !!}

                        <input hidden type="text" value="" name="project_id">
                        
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>


@endsection
@section('scripts')
    {!! Html::script('melody/js/data-table.js') !!}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"
        integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        Dropzone.options.myAwesomeDropzone = {
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },

            dictDefaultMessage: "Arrastre la imagen al recuadro para subirlo",
            acceptedFiles: "image/*",
            maxFilesize: 2,
            maxFiles: 4,
        };
        
    </script>
    <script>
        $('#exampleModal-2').on('show.bs.modal', function(e) {

            //get data-id attribute of the clicked element
            var bookId = $(e.relatedTarget).data('id');

            //populate the textbox
            $(e.currentTarget).find('input[name="project_id"]').val(bookId);
        });

    </script>
@endsection

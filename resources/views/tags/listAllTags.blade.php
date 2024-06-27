@extends('layouts.header_footer')
@section('content')
    <div class="containerAllUsers">
        <div class="topics-list">
           
            <div class="table-topics-container" style="background: #285ec2; border-radius: 20px;">
                <h2>Lista de Tags</h2>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Título do Tag</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tag #1</td>
                            <td>
                                <div class="row">
                                    <input type="submit" class="btn btn-edit" value="Editar">

                                </div>

                            </td>
                            <td>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#banModal"><i class="fa-solid fa-ban"></i> Excluir Tag</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Tag #2</td>
                            <td>
                                <div class="row">
                                    <input type="submit" class="btn btn-edit" value="Editar">

                                </div>

                            </td>
                            <td>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#banModal"><i class="fa-solid fa-ban"></i> Excluir Tag</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Tag #3</td>
                            <td>
                                <div class="row">
                                    <input type="submit" class="btn btn-edit" value="Editar">

                                </div>

                            </td>
                            <td>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#banModal"><i class="fa-solid fa-ban"></i> Excluir Tag</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Tag #4</td>
                            <td>
                                <div class="row">
                                    <input type="submit" class="btn btn-edit" value="Editar">

                                </div>

                            </td>
                            <td>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#banModal"><i class="fa-solid fa-ban"></i> Excluir Tag</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Tag #5</td>
                            <td>
                                <div class="row">
                                    <input type="submit" class="btn btn-edit" value="Editar">

                                </div>

                            </td>
                            <td>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#banModal"><i class="fa-solid fa-ban"></i> Excluir Tag</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Tag #6</td>
                            <td>
                                <div class="row">
                                    <input type="submit" class="btn btn-edit" value="Editar">

                                </div>

                            </td>
                            <td>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#banModal"><i class="fa-solid fa-ban"></i> Excluir Tag</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="banModal" tabindex="-1" aria-labelledby="banModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="banModalLabel">Excluir Tag</h5>
                    <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close" id="close-btn"></i>
                </div>
                <div class="modal-body">
                    Você tem certeza que deseja excluir este Tag?
                </div>
                <div class="modal-footer">
                    <form action="" method="POST" class="w-500">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value=" Confirmar">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

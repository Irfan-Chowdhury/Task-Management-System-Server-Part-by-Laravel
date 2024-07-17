<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel"> Edit Task </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="POST" id="updateForm">
                    @csrf

                    <input type="hidden" name="task_id" id="modelId">

                    <div class="row">

                        <div class="col-md-6">
                            <label><strong>Project Code <span class="text-danger">*</span> </strong></label>
                            <select name="project_id" class="form-control">
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->code }}</option>
                                @endforeach
                            </select>
                        </div>

                        @include('common-files.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Task Name',
                            'fieldType' => 'text',
                            'nameData' => 'name',
                            'placeholderData' => 'Ex: Layout Design',
                            'isRequired' => true,
                        ])

                        @include('common-files.input-field', [
                            'colSize' => 12,
                            'labelName' => 'Description',
                            'fieldType' => 'textarea',
                            'nameData' => 'description',
                            'placeholderData' => 'Ex: In publishing and graphic design, Lorem ipsum..',
                            'isRequired' => true,
                        ])

                        <div class="col-md-6">
                            <label><strong>Status</strong></label>
                            <select name="status" class="form-control">
                                <option value="Pending">Pending</option>
                                <option value="Working">Working</option>
                                <option value="Done">Done</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label><strong>Assigned To </strong></label>
                            <select name="user_id" class="form-control">
                                <option value="">NONE</option>
                                @foreach ($members as $member)
                                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" id="updateButton">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

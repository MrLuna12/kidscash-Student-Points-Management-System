<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary float-end mb-3" data-bs-toggle="modal" data-bs-target="#addStudentModal">
        <i class="bi bi-plus-circle"> Add student</i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="addStudentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addStudentModalLabel">New Student</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Modal Body --}}
                        <form wire:submit.prevent="saveStudent">
                            <div class="col-12 mb-3">
                                <label for="fName" class="form-label">First Name</label>
                                <input wire:model.defer="fname" type="text" class="form-control" id="fName" required>
                                @error('fname') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="lName" class="form-label">Last Name</label>
                                <input wire:model.defer="lname" type="text" class="form-control" id="lName" required>
                                @error('lname') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="dob" class="form-label">DOB</label>
                                <input wire:model.defer="dob" type="date" class="form-control" id="dob" required>
                                @error('dob') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="room" class="form-label">Room</label>
                                <input wire:model.defer="roomName" readonly class="form-control-plaintext text-muted" type="text" id="room" style="border: #dee2e6 1px solid; border-radius: 5px; padding: 6px 12px" required>
                                @error('roomName') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-4 mb-3">
                                <label for="points" class="form-label">Starting Points</label>
                                <input wire:model.defer="points" type="number" class="form-control" id="points" required>
                                @error('points') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

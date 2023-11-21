<div>
    <button class="btn mb-3" wire:click.prevent="goBack">
        <i class="bi bi-backspace"> Go Back</i>
    </button>

    <h1>Edit Profile</h1>
    <Form>
        <div class="mb-1">
            <label for="fname" class="form-label">
                <span>Name:</span>
                <input readonly class="form-control-plaintext text-muted" type="text" name="name" id="fname" value="{{$user->name}}" style="border: #dee2e6 1px solid; border-radius: 5px; padding: 6px 12px">
            </label>
        </div>

        <div class="mb-1">
            <label for="email" class="form-label">
                <span>Email:</span>
                <input readonly class="form-control-plaintext text-muted" type="email" name="email" id="email" value="{{$user->email}}" style="border: #dee2e6 1px solid; border-radius: 5px; padding: 6px 12px">
            </label>
        </div>
    </Form>

    <form wire:submit.prevent="saveProfile" wire:click="editForm">
        <div class="mb-3">
            Permissions
            <div class="form-check form-switch">
                <input wire:model="isAdmin" class="form-check-input" type="checkbox" role="switch" id="adminSwitch">
                <label class="form-check-label" for="adminSwitch">Admin</label>
            </div>
        </div>

        <div class="mb-3">
            Rooms
            @foreach($rooms as $room)
                <ul class="list-group">
                    <li class="list-group-item">
                        <input wire:model="selectedRooms"
                               class="form-check-input me-1"
                               type="checkbox"
                               id="{{$room->name}}"
                               value="{{$room->id}}">

                        <label class="form-check-label" for="{{$room->name}}">
                            {{$room->name}}
                            <span class="badge bg-primary rounded-pill">{{$room->value}}</span>
                        </label>
                    </li>
                </ul>
            @endforeach
        </div>
        <button class="btn btn-primary" type="submit">Save</button>
    </form>
</div>

@push('scripts')
    <script>
        Livewire.on('show-confirm-modal', () => {
            Swal.fire({
                title: 'Save Changes?',
                text: 'Do you want to save your changes?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                @this.call('saveProfile');
                } else {
                    window.location.href = '/admin';
                }
            });
        });
    </script>
@endpush

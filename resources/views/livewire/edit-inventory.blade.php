<div>
    <button class="btn mb-3" wire:click.prevent="goBack">
        <i class="bi bi-backspace"> Go Back</i>
    </button>

    <h1>Edit Inventory</h1>

    <form wire:submit.prevent="save" wire:click="editForm">
        <div class="mb-2">
            <label for="name" class="form-label">
                <span>Name:</span>
                <input wire:model="name" class="form-control" type="text" name="name" id="name" required>
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </label>
        </div>

        <div class="mb-2">
            <label for="description" class="form-label">
                <span>Description:</span>
                <textarea wire:model="description" class="form-control" name="description" id="description" required></textarea>
                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
            </label>
        </div>

        <div class="mb-2">
            <label for="value" class="form-label">
                <span>Value:</span>
                <input wire:model="value"  class="form-control" type="number" name="value" id="value" required>
                @error('value') <span class="text-danger">{{ $message }}</span> @enderror
            </label>
        </div>

        <div class="mb-2">
            <label for="type" class="form-label">
                <span>Type:</span>
                <select wire:model="type" class="form-select" name="type" id="type" required>
                    <option selected>Select Value Type</option>
                    <option value="0">Spending</option>
                    <option value="1">Earning</option>
                </select>
                @error('type') <span class="text-danger">{{ $message }}</span> @enderror
            </label>
        </div>

        <div class="mb-2">
            <label for="quantity" class="form-label">
                <span>Quantity:</span>
                <input wire:model="quantity" class="form-control" type="number" name="quantity" id="quantity">
                <div id="quantityHelp" class="form-text">Leave blank if not applicable</div>
            </label>
        </div>

        <button class="btn btn-primary" type="submit" @if(!$isEdit) disabled @endif>Save</button>
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
                @this.call('save');
                } else {
                    window.location.href = '/admin';
                }
            });
        });
    </script>
@endpush

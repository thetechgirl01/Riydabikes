@php $rule = $rule ?? null; @endphp
<div class="form-row">
    <div class="form-group col-md-6">
        <h6>Origin State</h6>
        <select name="origin_state" class="form-control" required>
            <option value="">— Select —</option>
            @foreach($states as $st)
                <option value="{{ $st }}" {{ old('origin_state', $rule->origin_state ?? '') == $st ? 'selected' : '' }}>{{ $st }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6">
        <h6>Destination State</h6>
        <select name="destination_state" class="form-control" required>
            <option value="">— Select —</option>
            @foreach($states as $st)
                <option value="{{ $st }}" {{ old('destination_state', $rule->destination_state ?? '') == $st ? 'selected' : '' }}>{{ $st }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6">
        <h6>Base Fare (₦)</h6>
        <input type="number" step="0.01" min="0" name="base_fare" class="form-control" value="{{ old('base_fare', $rule->base_fare ?? '') }}" required>
        <small class="text-muted">Speed multipliers and weight surcharge stack on top of this.</small>
    </div>
    <div class="form-group col-md-6">
        <h6>Status</h6>
        <label class="d-block mt-2">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $rule->is_active ?? 1) ? 'checked' : '' }}> Active
        </label>
    </div>
    <div class="form-group col-md-12">
        <h6>Notes <span class="text-muted">(optional)</span></h6>
        <textarea name="notes" rows="2" class="form-control">{{ old('notes', $rule->notes ?? '') }}</textarea>
    </div>
</div>
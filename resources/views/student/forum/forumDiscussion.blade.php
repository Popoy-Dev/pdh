@extends('student.forum.forum')

@section('forum')

<div class="row my-4 mx-3">
  <div class="col-lg-6">
    <div class="form-group">
      <select name="" id="" class="form-control i-discussion">
        <option selected disabled>Choose a topic tag</option>
        <option value="">tag1</option>
        <option value="">tag2</option>
        <option value="">tag3</option>
      </select>
    </div>
    <div class="form-group">
      <input type="text" class="form-control i-discussion" placeholder="Add more tags">
    </div>

  </div>
</div>

<div class="row mx-3">
  <div class="col-lg-8 col-md-8">
    <div class="form-group">
      <textarea name="name" rows="8" cols="80" class="form-control i-discussion" id="summernote"></textarea>
    </div>
    <div class="form-group text-center">
      <button class="btn" style="background-color: #08CDFF;color: #fff;border-radius: 20px;">POST</button>
    </div>
  </div>
</div>




@endsection

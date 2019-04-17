<template>
  <div class="card gedf-card">
    <div class="card-body">
        <div class="form-group">
          <label class="sr-only" for="message">post</label>
          <textarea class="form-control" id="message" rows="2" placeholder="What are you thinking?"></textarea>
        </div>
        <div class="form-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Upload image</label>
          </div>
        </div>
        <div class="py-3"></div>
        <div class="btn-toolbar justify-content-between">
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </div>
    </div>
  </div>
</template>


<script>
export default {
  name: 'Main',
  props: {
    msg: String
  }
}
</script>



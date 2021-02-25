
<section class="invoice-form">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <form action="<?=home_url('invoice')?>" method="get">
          <div class="form-group">
            <label for="exampleInputEmail1">Enter invoice ref.</label>
            <input type="text" class="form-control" placeholder="Reference ID" name="ref">    
          </div>  
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</section>
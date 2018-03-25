<legend>Events</legend>
{{--<p>{{ msg }}</p>--}}
<div class="col-md-4">
    <div class="form-group">
        <label>Title</label><br>
        <input type="text" class="form-control" v-model="event.title" value="{{(isset($event->title) ? $event->title : "")}}" name="title" placeholder="Title" required><br>
    </div>
</div>

<div class="col-md-8">
    <div class="form-group">
        <label>Description</label><br>
        <textarea type="text" class="form-control" v-model="event.description" name="description" placeholder="Description" required>{{(isset($event->description) ? $event->description : "")}}
        </textarea><br>
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <label>Country</label><br>
        <input type="text" class="form-control" v-model="event.country" value="{{(isset($event->country) ? $event->country : "")}}" name="country" placeholder="Country" required>
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <label>City</label><br>
        <input type="text" class="form-control" v-model="event.city" value="{{(isset($event->city) ? $event->city : "")}}" name="city" placeholder="City" required><br>
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <label>Venue</label><br>
        <textarea type="text" class="form-control" name="venue" placeholder="Venue" required>{{(isset($event->venue) ? $event->venue : "")}}
        </textarea>
    </div>
</div>


<div class="col-md-4">
    <div class="form-group">
        <label>Start date</label><br>
        <input type="date" class="form-control" name="start_date" value="{{(isset($event->start_date) ? $event->start_date : "")}}" placeholder="date" required><br>
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <label>End date</label><br>
        <input type="date" class="form-control" name="end_date" value="{{(isset($event->end_date) ? $event->end_date : "")}}" placeholder="date" required><br>
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <label>Start time</label><br>
        <input type="time" class="form-control" name="start_time" value="{{(isset($event->start_time) ? $event->start_time : "")}}" placeholder="start time" required><br>
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <label>End time</label><br>
        <input type="time" class="form-control" name="end_time" value="{{(isset($event->end_time) ? $event->end_time : "")}}" placeholder="end time" required><br>
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <label>Cover image</label><br>
        <input type="file" class="form-control" name="image_path" accept="image/*"><br>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="add event"/>
    </div>
</div>
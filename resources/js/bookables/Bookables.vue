<template>
  <div>
    <bookable-list-item
      title="Cheap Villa"
      content="A very cheap villa"
      :price="2000"
    ></bookable-list-item>
    <bookable-list-item
      title="Expensive Villa"
      content="A very expensive villa"
      :price="20000"
    ></bookable-list-item>
  </div>
</template>

<script>
import BookableListItem from "./BookableListItem";

export default {
  components: { BookableListItem },
};
</script>

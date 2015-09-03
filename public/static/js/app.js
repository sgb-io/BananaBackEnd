$(function(){

  var self = this;
  var sweetyView;

  var Router = Backbone.Router.extend({
    routes: {
      '?*params': 'index'
    }
  });

  var SweetyCollection = Backbone.Collection.extend({
    url: '/sweeties'
  });

  var ItemCollection = Backbone.Collection.extend({
    items: [],
    total: 0,

    addItem: function(item) {
      var self = this;
      var matches = _.where(self.items, { 'id' : item.id });
      if (matches.length > 0) {
        var existing = matches[0];
        existing.quantity++;
      } else {
        item.quantity = 1;
        self.items.push(item);
      }
      return self;
    },

    removeItem: function(target) {
      var self = this;
      self.items = _.reject(self.items, function(item) {
        return item.id === target.id;
      });
    },

    formattedTotal: function() {
      var self = this;
      var total = 0.0;
      self.items.forEach(function(item) {
        total += (parseFloat(item.price) * parseInt(item.quantity));
      });
      self.total = total;
    }
  });

  var BasketView = Backbone.View.extend({
    //el: $('#basket'),
    //tagName: 'div',

    template: _.template($('#basket-template').html()),

    initialize: function() {
      var self = this;
      self.items = new ItemCollection;
    },

    render: function() {
      var self = this;
      console.log(self.items);
      var html = self.template({
        'formattedTotal': self.items.formattedTotal(),
        'items': self.items.toJSON()
      });
      // self.$el is unreachable?
      //console.log(self.$el.html());
      self.$el.html(html);
      //$(self.$el).html(html);
    },

    addItem: function(item) {
      var self = this;
      self.items = self.items.addItem(item);
      self.render();
    }
  });

  var SweetyListView = Backbone.View.extend({
    el: '#sweeties',

    template: _.template($('#sweety-template').html()),

    events: {
      'change .select-filter': 'changeFilter',
      'click .add-button': 'addItem'
    },

    selectedFilter: 'all',

    initialize: function() {
      var self = this;
      self.router = new Router;

      self.sweeties = new SweetyCollection;
      self.basket = new BasketView;

      self.router.on('route:index', function(params) {
        self.getResults(params);
      });

      Backbone.history.start({pushState: true});
    },

    render: function() {
      var self = this;
      var html = self.template({
        'sweeties': self.sweeties.toJSON(),
        'filters': ['all', 'fruit', 'dinner', 'snack', 'daytime'],
        'selectedFilter': self.selectedFilter
      });
      $(self.el).html(html);

      // render children
      self.$('#basket').html(self.basket.render());
    },

    changeFilter: function(ele) {
      var self = this;
      var filter = event.target.value;
      self.router.navigate('/?type=' + filter, {'trigger': true});
    },

    getResults: function(params) {
      var self = this;
      var type = params.replace('type=', '');
      self.selectedFilter = type;
      self.sweeties.fetch({
        'data' : $.param({
          'type': self.selectedFilter
        }),
        'success': function() {
          self.render();
        }
      });
    },

    addItem: function(event) {
      event.preventDefault();
      var self = this;
      var sweetId = $(event.target).attr('data-sweet-id');
      var selectedSweet = _.where(self.sweeties.toJSON(), { 'id' : sweetId })[0];
      self.basket.addItem(selectedSweet);
    }
  });

  sweetyView = new SweetyListView;

});

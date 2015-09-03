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
    formattedTotal: function() {
      return '£100.00';
    }
  });

  var SweetyListView = Backbone.View.extend({
    el: '#sweeties',

    template: _.template($('#sweety-template').html()),

    events: {
      'change .select-filter': 'changeFilter'
    },

    selectedFilter: 'all',

    initialize: function() {
      var self = this;
      self.router = new Router;

      self.sweeties = new SweetyCollection;
      self.items = new ItemCollection;

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
        'selectedFilter': self.selectedFilter,
        'formattedTotal': self.items.formattedTotal(),
        'items': self.items.toJSON()
      });
      $(self.el).html(html);
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
    }
  });

  sweetyView = new SweetyListView;

});
